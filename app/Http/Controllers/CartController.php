<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Products;
use App\Models\Sku;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Gloudemans\Shoppingcart\Contracts\Buyable;

class CartController extends Controller
{
    public function addToCart(Request $request){
    	
        $product_id = $request->product_id;

        $productById = Products::where('product_id', $product_id)->first();

        $skuById = Sku::where('product_id', $product_id)->first();
        
        // $cart = Session::get('cart');
        Cart::add([
            'product_id'    =>  $product_id,
            'product_name'  =>  $productById->product_name,
            'desc'          =>  $productById->product_desc,
            'price'         =>  $skuById->unit_price,
            'qty'           =>  $request->qty
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

        return redirect('/shop-cart');
    }

    public function cartDestroy(){
        Cart::destroy();

        return redirect('/shop-cart');
    }
    
}