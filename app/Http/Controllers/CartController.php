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
        if($request->isMethod('post')) {
            $request->validate([
                'billing_address1' => 'required|max:100',
                'billing_barangay' => 'required|max:100',
                'billing_city' => 'required|max:100',
                'billing_province' => 'required|max:100',
                'billing_zipcode' => 'required|max:100',
                'billing_country' => 'required|max:100',
                'shipping_address1' => 'required|max:100',
                'shipping_barangay' => 'required|max:100',
                'shipping_city' => 'required|max:100',
                'shipping_province' => 'required|max:100',
                'shipping_zipcode' => 'required|max:100',
                'shipping_country' => 'required|max:100',

            ]);
            // return redirect()->back()->with('flash_message_error', 'Please fill all fields');
        }

        $cartProducts = Cart::Content();
        $countries = Country::orderBy('code')->get();
        $places = Places::orderBy('place')->get();
        $customer_address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();

        $customer_address->billing_address1     = $request['billing_address1'];
        $customer_address->billing_barangay     = $request['billing_barangay'];
        $customer_address->billing_city         = $request['billing_city'];
        $customer_address->billing_province     = $request['billing_address1'];
        $customer_address->billing_zipcode      = $request['billing_zipcode'];
        $customer_address->billing_country      = $request['billing_country'];
        $customer_address->shipping_address1    = $request['shipping_address1'];
        $customer_address->shipping_barangay    = $request['shipping_barangay'];
        $customer_address->shipping_city        = $request['shipping_city'];
        $customer_address->shipping_province    = $request['shipping_province'];
        $customer_address->shipping_zipcode     = $request['shipping_zipcode'];
        $customer_address->shipping_country     = $request['shipping_country'];

        $customer_address->save();

        return view('user.templates.shop-checkout',['places' =>$places,'cartProducts'=>$cartProducts, 'user' => $customer_address, 'countries' => $countries]);
    }

    public function cartShowCheckoutReview(){
        $cartProducts = Cart::Content();
        $countries = Country::orderBy('code')->get();
        $places = Places::ordeBy('place')->get();
        $customer_address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
        return view('user.templates.shop-checkoutReview',['cartProducts'=>$cartProducts, 'user' => $customer_address, 'countries' => $countries , 'places' =>$places]);
        
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
       
        return view('user.templates.invoice.invoice',['cartProducts'=>$cartProducts]);
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
    //     $address->shipping_address1 = $request['shipping_address1'];
    //     $address->shipping_barangay = $request['shipping_barangay'];
    //     $address->shipping_city     = $request['shipping_city'];
    //     $address->shipping_province = $request['shipping_province'];
    //     $address->shipping_zipcode  = $request['shipping_zipcode'];
    //     $address->shipping_country  = $request['shipping_country'];
    //     $address->shipping_same_as_billing_address  = 0;

    //     $address->save();

    //     return redirect()->back()->with('message', 'Customers Address has been added.');
    // }
    
}