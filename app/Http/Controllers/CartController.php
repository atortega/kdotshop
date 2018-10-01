<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Products;
use App\Models\Sku;
use Cart;
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

    public function cartRemove($rowId){
        Cart::remove($rowId);

        return redirect('/shop-cart');
    }
    
}