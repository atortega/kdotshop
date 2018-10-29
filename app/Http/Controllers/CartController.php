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
        $cartProducts = Cart::Content();
        $countries = Country::orderBy('code')->get();
        $customer_address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();

        if($request->isMethod('post')){
            $data = $request->all();
            // 
            if(empty($data['billing_address1']) || (empty($data['billing_barangay']) || (empty($data['billing_city']) || (empty($data['billing_province']) || (empty($data['billing_zipcode']) || (empty($data['billing_country']) || (empty($data['shipping_address1']) || (empty($data['shipping_barangay']) || (empty($data['shipping_city']) || (empty($data['shipping_province']) || (empty($data['shipping_zipcode']) || (empty($data['shipping_country'])){
                    return redirect()->back()->with('flash_message_error','Please fill all fields  to Checkout');
            }
        }
        return view('user.templates.shop-checkout',['cartProducts'=>$cartProducts, 'user' => $customer_address, 'countries' => $countries]);
    }

    public function cartShowCheckoutReview(){
        $cartProducts = Cart::Content();
        $countries = Country::orderBy('code')->get();
        $customer_address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
        return view('user.templates.shop-checkoutReview',['cartProducts'=>$cartProducts, 'user' => $customer_address, 'countries' => $countries]);
        
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