<?php

namespace App\Http\Controllers;

use Datatables;

use Illuminate\Http\Request;

use App\Models\Customers;

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
            'name'              => 'required|max:30',
            'address'           => 'required|max:100',
            'phone_number'      => 'required',
            'email'             => 'required|email|unique:customer,email',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ]);

		$customer = new Customers;
		
		$customer->name 		= $request['name'];
		$customer->address 		=  $request['address'];
		$customer->phone_number =  $request['phone_number'];
		$customer->email 		=  $request['email'];
		$customer->password 	=  md5($request['password']);
		
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
}
