<?php

namespace App\Http\Controllers;

use Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Customers;
use App\Models\Country;
use App\Models\CustomersAddress;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Datatables::of(Customers::query())
            ->addColumn('actions', function ($data) {
                return "
                    <button class='btn btn-xs btn-primary customer-edit-btn' sid='$data->customer_id'>Edit</button>
                    <button class='btn btn-xs btn-danger customer-delete-btn' sid='$data->customer_id' sname='$data->name'>Delete</button>
                    ";
                //return "Edit";
            })
            ->escapeColumns('actions')
            ->make(true);
        
        return ($customers);
    }
    
    public function getCustomerById($id)
    {
        $customer = Customers::where('customer_id', $id)->first();
        
        return $customer;
        
    }
    
    public function addCustomer(Request $request)
    {
        $request->validate([
            'first_name'        => 'required|max:30',
            'last_name'         => 'required|max:30',
            'middle_name'       => 'required',
            'birthdate'         => 'required',
            'gender'            => '',
            'address'           => 'required|max:100',
            'phone_number'      => 'required',
            'email'             => 'required|email|unique:customer,email',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ]);

        $customer = new Customers;
        

        $customer->first_name   = $request['first_name'];
        $customer->last_name    = $request['last_name'];
        $customer->birthdate    = $request['birthdate'];
        $customer->gender       = $request['gender'];
        $customer->address      =  $request['address'];
        $customer->phone_number =  $request['phone_number'];
        $customer->email        =  $request['email'];
        $customer->password     =  md5($request['password']);
        
        $customer->save();
        
        //return $customer;

        return redirect()->back()->with('message', 'New customer has been added.');
    }


    /*
     * Delete Customer
     *
     * @param Array $request
     *
     * @return Array $return
     */
    public function deleteCustomer(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
        ]);

        $customer = Customers::find($request['customer_id']);
        $customer->delete();

        return array('error' => false, "message"  => "Customer successfully deleted!");
    }

    /*
    * Edit Customer
    *
    * @param Array $request
    *
    * @return Array $result
    */
    public function editCustomer(Request $request)
    {
        $request->validate([
            'name'              => 'required|max:30',
            'address'           => 'required|max:100',
            'phone_number'      => 'required',
            'email'             => 'required',
        ]);

        $customer = Customers::where('customer_id', $request['customer_id'])->first();
        $customer->name         = $request['name'];
        $customer->address      = $request['address'];
        $customer->email        = $request['email'];
        $customer->phone_number = $request['phone_number'];

        $customer->save();

        return array('error' => false, "message"  => "Customer successfully updated!");
    }
    
    public function createCustomer(Request $request)
    {
        $request->validate([
            'email'             => 'required|email|unique:customer,email',
            'phone_number'      => 'required',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ]);

        $customer = new Customers;
        $customer->first_name   = $request['first_name'];
        $customer->last_name    = $request['last_name'];
        $customer->birthdate    = $request['birthdate'];
        $customer->gender       = $request['gender'];
        $customer->address      = $request['address'];
        $customer->email        = $request['email'];
        $customer->password     = md5($request['password']);
        $customer->phone_number = $request['phone_number'];
        
        $customer->save();

        
        //return $customer;

        //return redirect()->back()->with('message', 'You are successfully registered.');

        return redirect('/');
    }


    /*
     * Login Form
     *
     */
    public function loginFormCustomer(Request $request)
    {
        //if ($request->session()->get('logged_in')) {
           // return redirect('/');
        //}
        return view('user.templates.page-login');
    }

    public function loginCustomer(Request $request)
    {
        $request->validate([
            'email'             => 'required|email|exists:customer,email',
            'password'          => 'required|string|min:8',
        ]);


        $customer = Customers::where("email", $request->email)->first();
        if (!$customer) {
            return back()->withErrors('Invalid E-mail!');
        }
        
        if ($customer->password != md5($request->password)) {
            return back()->withErrors('Password not correct!');
        }

        //save to session
        $request->session()->put('logged_in', true);
        $request->session()->put('email', $request->email);
        $request->session()->put('customer', $customer);

        //$url = $request->input('url'); 

       //return redirect($url);
         return redirect('/');
    }
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email'             => 'required|email|unique:customer,email',
            'new_password'          => 'required|string',
            'confirm_new_password' => 'required|string',
        ]);

        $customer = Customers::where("email", $request->email)->first();
        if (!$customer) {
            $error="Invalid E-mail!";
            return false;
        }
        
        if ($customer->password != md5($request->password)) {
            $error = "Password not correct!";
            return false;
        }

        //save to session
        $request->session()->put('logged_in', true);
        $request->session()->put('email', $request->email);
        $request->session()->put('customer', $customer);

        //return redirect()->action('MainController@index');
        return redirect('/');
    }

    public function account(Request $request)
    {
       
    }

    public function saveProfile(Request $request)
    {
        $request->validate([
            'phone_number'      => 'required',
            'first_name'        => 'required',
            'last_name'         => 'required',
            'gender'            => 'required',
            'phone_number'      => 'required',
            'birthdate'         => 'date'
        ]);

        $customer = Customers::where('customer_id', Auth::user()->customer_id)->first();

        $birthdate = date('Y-m-d H:i:s', strtotime($request['birthdate']));

        $customer->first_name   =  $request['first_name'];
        $customer->middle_name  =  $request['middle_name'];
        $customer->last_name    =  $request['last_name'];
        $customer->gender       =  $request['gender'];
        $customer->birthdate    =  $birthdate;
        $customer->phone_number =  $request['phone_number'];

        $customer->save();

        return redirect('/account');
    }

    /*
     * Change Password
     *
     * @param Array $request
     *
     * @return void
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'  => 'required',
            'new_password'      => 'required|min:8|confirmed'
        ]);

        if (Hash::check($request['current_password'], Auth::user()->getAuthPassword())) {
            $customer = Customers::where('customer_id', Auth::user()->customer_id)->first();
            $customer->password = Hash::make($request['new_password']);
            $customer->save();
            return redirect()->back()->with('message', 'Password changed successfully');
        } else {
            return redirect()->back()->with('message', 'Current Password not correct!');
        }

    }

    public function updateProfileForm()
    {
        $birthdate = date('m/d/Y', strtotime(Auth::user()->birthdate));
        return view('user.templates.editprofile', ["birthdate" => $birthdate]);
    }

    public function AddressViewForm()
    {
        $countries = Country::orderBy('code')->get();
        $address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
        if (!$address) {
            $address = new CustomersAddress();
            $address->billing_address1  = '';
            $address->billing_barangay  = '';
            $address->billing_city      = '';
            $address->billing_province  = '';
            $address->billing_zipcode   = '';
            $address->billing_country   = '';
            $address->shipping_address1 = '';
            $address->shipping_barangay = '';
            $address->shipping_city     = '';
            $address->shipping_province = '';
            $address->shipping_zipcode  = '';
            $address->shipping_country  = '';
        }
        return view('user.templates.addresses', ['countries' => $countries, 'user' => $address ]);

    }
    
    

    public function insertAddress(Request $request)
    {

        $address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
        if (!$address) {
            $address = new CustomersAddress();
            $address->customer_id       = Auth::user()->customer_id;
        }


        $address->billing_address1  = $request['billing_address1'];
        $address->billing_barangay  = $request['billing_barangay'];
        $address->billing_city      = $request['billing_city'];
        $address->billing_province  = $request['billing_province'];
        $address->billing_zipcode   = $request['billing_zipcode'];
        $address->billing_country   = $request['billing_country'];
        $address->shipping_address1 = $request['shipping_address1'];
        $address->shipping_barangay = $request['shipping_barangay'];
        $address->shipping_city     = $request['shipping_city'];
        $address->shipping_province = $request['shipping_province'];
        $address->shipping_zipcode  = $request['shipping_zipcode'];
        $address->shipping_country  = $request['shipping_country'];
        $address->shipping_same_as_billing_address  = 0;

        $address->save();

        return redirect()->back()->with('message', 'Customers Address has been added.');
    }
}