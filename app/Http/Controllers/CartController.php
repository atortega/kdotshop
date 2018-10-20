<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Sku;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Customers;
use App\Models\Country;
use App\Models\CustomersAddress;
// use Gloudemans\Shoppingcart\Contracts\Buyable;

class CartController extends Controller
{
    public function addToCart(Request $request){
        
        $product_id = $request->product_id;

        $productById = Products::where('product_id', $product_id)->first();

        $skuById = Sku::where('product_id', $product_id)->first();
        
        // $cart = Session::get('cart');
        Cart::add([
            'id'    =>  $product_id,
            'name'  =>  $productById->product_name,
            'desc'  =>  $productById->product_desc,
            'price' =>  $skuById->unit_price,
            'qty'   =>  $request->qty
        ]);
        // Session::put('cart', $cart);

        return redirect('/shop-cart');
    }

    public function cartShow(){
        $cartProducts = Cart::Content();
       
        return view('user.templates.shop-cart',['cartProducts'=>$cartProducts]);
    }

    public function cartShowCheckout(){
        $cartProducts = Cart::Content();
       
         return view('user.templates.shop-checkout',['cartProducts'=>$cartProducts]);
     }

     public function cartShowCheckoutReview(){
        $cartProducts = Cart::Content();
       
         return view('user.templates.shop-checkoutReview',['cartProducts'=>$cartProducts]);
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
    //     $countries = Country::orderBy('code')->get();
    //     $address = CustomersAddress::where('customer_id', Auth::user()->customer_id)->first();
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
    //     return view('user.templates.shop-checkoutReview', ['countries' => $countries, 'user' => $address ]);
       
    // }
    
}