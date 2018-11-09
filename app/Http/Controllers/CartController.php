<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Sku;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Customers;
use App\Models\Country;
use App\Models\Sizes;
use App\Models\CustomersAddress;
use App\Models\Places;
use App\Models\Cities;
use App\Models\Provinces;
// use Gloudemans\Shoppingcart\Contracts\Buyable;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $product_id     = $request->product_id;
        $productById    = Products::where('product_id', $product_id)->first();
        $skuById        = Sku::where('product_id', $product_id)->first();
        $color          = Colors::where('color_id', $request->color)->first();
        $size           = Sizes::where('size_id', $request->size)->first();

        Cart::add([
            'id'        =>  $product_id,
            'name'      =>  $productById->product_name,
            'qty'       =>  $request->qty,
            'price'     =>  $skuById->unit_price,
            'options'   => [
                'desc'      =>  $productById->product_desc,
                'image'     =>  $productById->product_image,
                'color_id'  =>  $request->color,
                'size_id'   =>  $request->size,
                'color'     =>  $color->color,
                'size'      =>  $size->size
            ]


        ]);
        // Session::put('cart', $cart);

        return redirect('/shop-cart');
    }

    public function cartShow(){
        $cartProducts = Cart::Content();

        return view('user.templates.shop-cart',['cartProducts'=>$cartProducts]);
    }

    public function cartShowCheckout(Request $request){
        // if($request->isMethod('post')) {
        //     $request->validate([
        //         'billing_address1' => 'required|max:100',
        //         'billing_barangay' => 'required|max:100',
        //         'billing_city' => 'required|max:100',
        //         'billing_province' => 'required|max:100',
        //         'billing_zipcode' => 'required|max:100',
        //         'billing_country' => 'required|max:100',
        //         'shipping_address1' => 'required|max:100',
        //         'shipping_barangay' => 'required|max:100',
        //         'shipping_city' => 'required|max:100',
        //         'shipping_province' => 'required|max:100',
        //         'shipping_zipcode' => 'required|max:100',
        //         'shipping_country' => 'required|max:100',

        //     ]);
        //     // return redirect()->back()->with('flash_message_error', 'Please fill all fields');
        // }

        $cartProducts = Cart::Content();
        $countries = Country::orderBy('code')->get();
        $places = Places::orderBy('place')->get();
        $cities = Cities::orderBy('cities')->get();
        $provinces = Provinces::orderBy('provinces')->get();
        $customer_address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();

        // $customer_address->billing_address1     = $request['billing_address1'];
        // $customer_address->billing_barangay     = $request['billing_barangay'];
        // $customer_address->billing_city         = $request['billing_city'];
        // $customer_address->billing_province     = $request['billing_address1'];
        // $customer_address->billing_zipcode      = $request['billing_zipcode'];
        // $customer_address->billing_country      = $request['billing_country'];
        // $customer_address->shipping_address1    = $request['shipping_address1'];
        // $customer_address->shipping_barangay    = $request['shipping_barangay'];
        // $customer_address->shipping_city        = $request['shipping_city'];
        // $customer_address->shipping_province    = $request['shipping_province'];
        // $customer_address->shipping_zipcode     = $request['shipping_zipcode'];
        // $customer_address->shipping_country     = $request['shipping_country'];

        // $customer_address->save();

        return view('user.templates.shop-checkout',['places' =>$places,'cartProducts'=>$cartProducts, 'user' => $customer_address, 'countries' => $countries,  'cities' => $cities , 'provinces' => $provinces]);
    }

    public function cartShowCheckoutReview(){
        $cartProducts = Cart::Content();
        $countries = Country::orderBy('code')->get();
        $places = Places::orderBy('place')->get();
        $cities = Cities::orderBy('cities')->get();
        $provinces = provinces::orderBy('provinces')->get();
        $customer_address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
        return view('user.templates.shop-checkoutReview',['cartProducts'=>$cartProducts, 'user' => $customer_address, 'countries' => $countries , 'places' =>$places ,  'cities' => $cities , 'provinces' => $provinces]);
        
     }

    public function cartUpdate(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;

        Cart::update($rowId, $qty);

        return array('error' => false, "message"  => "Quantity successfully updated!");
    }

    public function cartRemove($rowId){
        Cart::remove($rowId);

        return redirect()->back()->with('item-removed-message', 'An item has been removed. 🙁');
    }

    public function cartDestroy(){
        Cart::destroy();

        return redirect()->back()->with('clear-items-message', 'All items has been removed. 😥');
    }

    public function cartShowInvoice(){
        $cartProducts = Cart::Content();
        $countries = Country::orderBy('code')->get();
        $places = Places::orderBy('place')->get();
        $cities = Cities::orderBy('cities')->get();
        $provinces = Provinces::orderBy('provinces')->get();
        $customer_address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
       
        return view('user.templates.invoice.invoice',['places' =>$places,'cartProducts'=>$cartProducts, 'user' => $customer_address, 'countries' => $countries,  'cities' => $cities , 'provinces' => $provinces]);
    }

    // public function CheckoutAddressViewForm()
    // {
    //     $address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
    //     $countries = Country::orderBy('code')->get();

    //     if (!$address) {
    //         $address = new CustomersAddress();
    //         $address->billing_address1  = '';
    //         $address->billing_barangay  = '';
    //         $address->billing_city      = '';
    //         $address->billing_province  = '';
    //         $address->billing_zipcode   = '';
    //         $address->billing_country   = '';
    //         $address->shipping_address1 = '';
    //         $address->shipping_barangay = '';
    //         $address->shipping_city     = '';
    //         $address->shipping_province = '';
    //         $address->shipping_zipcode  = '';
    //         $address->shipping_country  = '';
    //     }
    //     return view('user.templates.shop-checkout', ['countries' => $countries, 'user' => $address ]);

    // }
    
    

    // public function CheckoutinsertAddress(Request $request)
    // {

    //     $address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
    //     if (!$address) {
    //         $address = new CustomersAddress();
    //         $address->customer_id       = Auth::user()->customer_id;
    //     }


    //     $address->billing_address1  = $request['billing_address1'];
    //     $address->billing_barangay  = $request['billing_barangay'];
    //     $address->billing_city      = $request['billing_city'];
    //     $address->billing_province  = $request['billing_province'];
    //     $address->billing_zipcode   = $request['billing_zipcode'];
    //     $address->billing_country   = $request['billing_country'];
        // $address->shipping_address1 = $request['shipping_address1'];
        // $address->shipping_barangay = $request['shipping_barangay'];
        // $address->shipping_city     = $request['shipping_city'];
        // $address->shipping_province = $request['shipping_province'];
        // $address->shipping_zipcode  = $request['shipping_zipcode'];
        // $address->shipping_country  = $request['shipping_country'];
        // $address->shipping_same_as_billing_address  = 0;

    //     $address->save();

    //     return redirect()->back()->with('message', 'Customers Address has been added.');
    // }

    public function cartCheckoutSubmit(Request $request)
    {
        $request->validate([
            'billing_address1' => 'string|required|max:100',
            'billing_barangay' => 'string|required|max:100',
            'billing_city' => 'string|required|max:100',
            'billing_province' => 'string|required|max:100',
            'billing_zipcode' => 'string|required|max:100',
            'billing_country' => 'string|required|max:50',
            'shipping_address1' => 'required_without:shipping_same_as_billing|max:100',
            'shipping_barangay' => 'string|required_without:shipping_same_as_billing|max:100',
            'shipping_city' => 'string|required_without:shipping_same_as_billing|max:100',
            'shipping_province' => 'string|required_without:shipping_same_as_billing|max:100',
            'shipping_zipcode' => 'max:100',
            'shipping_country' => 'string|required_without:shipping_same_as_billing|max:50',
            'shipping_same_as_billing' => 'integer',
        ]);
        $same_as_billing = isset($request->shipping_same_as_billing) ? true : false;
        if ($same_as_billing) {
            $shipping_fee = $request->billing_address_fee;
        } else {
            $shipping_fee = $request->shipping_address_fee;
        }
        if ($request->delivery_method == 2) {
            $shipping_fee = 0;
        }

        $customerAddress = [
            'billing_address1'  => $request->billing_address1,
            'billing_barangay'  => $request->billing_barangay,
            'billing_city'  => $request->billing_city,
            'billing_province'  => $request->billing_province,
            'billing_zipcode'  => $request->billing_zipcode,
            'billing_country'  => $request->billing_country,
            'shipping_address1'  => $same_as_billing ? $request->billing_address1 : $request->shipping_address1,
            'shipping_barangay'  => $same_as_billing ? $request->billing_barangay : $request->shipping_barangay,
            'shipping_city'  => $same_as_billing ? $request->billing_city : $request->shipping_city,
            'shipping_province'  => $same_as_billing ? $request->billing_province : $request->shipping_province,
            'shipping_zipcode'  => $same_as_billing ? $request->billing_zipcode : $request->shipping_zipcode,
            'shipping_country'  => $same_as_billing ? $request->billing_country : $request->shipping_country
        ];

        $customer_address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
        $customer_address->billing_address1    = $customerAddress['billing_address1'];
        $customer_address->billing_barangay    = $customerAddress['billing_barangay'];
        $customer_address->billing_city        = $customerAddress['billing_city'];
        $customer_address->billing_province    = $customerAddress['billing_province'];
        $customer_address->billing_zipcode     = $customerAddress['billing_zipcode'];
        $customer_address->billing_country     = $customerAddress['billing_country'];
        $customer_address->shipping_address1    = $customerAddress['shipping_address1'];
        $customer_address->shipping_barangay    = $customerAddress['shipping_barangay'];
        $customer_address->shipping_city        = $customerAddress['shipping_city'];
        $customer_address->shipping_province    = $customerAddress['shipping_province'];
        $customer_address->shipping_zipcode     = $customerAddress['shipping_zipcode'];
        $customer_address->shipping_country     = $customerAddress['shipping_country'];
        $customer_address->save();

        session(['customerAddress' => $customerAddress]);
        session(['delivery_method' => $request->delivery_method]);
        session(['delivery_method_name' => $request->delivery_method_name]);
        session(['shipping_fee' => $shipping_fee]);

        return redirect('/shop-checkoutReview');
    }
}