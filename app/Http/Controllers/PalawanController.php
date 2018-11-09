<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

/** All PayPal Details class **/

use Redirect;
use Session;
use URL;
use Nexmo\Laravel\Facade\Nexmo;

use App\Models\Orders;
use App\Models\Payments;
use App\Models\Invoices;
use App\Models\OrderDetails;
use App\Models\Delivery_addresses;
use App\Models\OrderTrackers;
use App\Models\Sku;
use App\Models\PopularProducts;

class PalawanController extends Controller
{


	public function proceedPaymentCheckout(Request $request)
	{

        //insert data to orders table
        $order = new Orders();
        $order->customer_id             = Auth::user()->customer_id;
        $order->billing_firstname       = Auth::user()->first_name;
        $order->billing_lastname        = Auth::user()->last_name;
        $order->billing_phone_number    = Auth::user()->phone_number;
        $order->billing_email           = Auth::user()->email;
        $order->shipping_firstname      = Auth::user()->first_name;
        $order->shipping_lastname       = Auth::user()->last_name;
        $order->shipping_phone_number   = Auth::user()->phone_number;
        $order->shipping_email          = Auth::user()->email;
        $order->delivery_method_id      = session('delivery_method');
        $order->order_date              = date('Y-m-d');
        $order->shipping_fee            = Session::get('shipping_fee');
        $order->total_amount            = str_replace(",", "", Cart::total()) + Session::get('shipping_fee');
        $order->status                  = 'pending';
        $order->save();

        //insert data to delivery_addresses table
        $address = session('customerAddress');


        $delivery = new Delivery_addresses();
        $delivery->order_id = $order->order_id;
        $delivery->customer_id = $order->customer_id;
        $delivery->first_name = $order->shipping_firstname;
        $delivery->last_name = $order->shipping_lastname;
        $delivery->address = $address['shipping_address1'];
        $delivery->barangay = $address['shipping_barangay'];
        $delivery->city = $address['shipping_city'];
        $delivery->province = $address['shipping_province'];
        $delivery->zipcode = $address['shipping_zipcode'];
        $delivery->country = $address['shipping_country'];
        $delivery->save();

        //insert data to payment table
        $payment = new Payments();
        $payment->payment_method_id = 3;
        $payment->order_id          = $order->order_id;
        $payment->amount            = str_replace(",", "", Cart::total())  + Session::get('shipping_fee');
        $payment->save();

        //insert data to Invoice table
        $invoice = new Invoices();
        $invoice->payment_id    = $payment->payment_id;
        $invoice->date          = date('Y-m-d');
        $invoice->save();

        //update the invoice number at payment table
        $payment->invoice_number = $invoice->invoice_number;
        $payment->save();

        //insert data to order_trackers table
        $tracker = new OrderTrackers();
        $tracker->order_id = $order->order_id;
        $tracker->status = $order->status;
        $tracker->notes = 'Initial purchased thru Palawan';
        $tracker->created_by_id = Auth::user()->customer_id;
        $tracker->created_by_name = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        $tracker->save();

        //insert data to order details table
        foreach(Cart::content() AS $cart) {
            $options = $cart->options;

            $order_details = new OrderDetails();
            $order_details->order_id = $order->order_id;
            $order_details->product_id = $cart->id;
            $order_details->product_name = $cart->name;
            $order_details->quantity = $cart->qty;
            $order_details->price = str_replace(",", "", $cart->price);
            $order_details->amount = str_replace(",", "", $cart->price) * $cart->qty;

            $order_details->description = $options->desc;
            $order_details->color_id = $options->color_id;
            $order_details->size_id = $options->size_id;
            $order_details->color = $options->color;
            $order_details->size = $options->size;
            $order_details->sku = $options->sku;
            $order_details->sku_id = $options->sku_id;

            $order_details->save();

            //deduct product inventory
            $sku = Sku::where('id', $options->sku_id)->first();
            if ($sku->number_of_items >= $cart->qty) {
                $bal = $sku->number_of_items - $cart->qty;
            } else {
                $bal = 0;
            }
            $sku->number_of_items = $bal;
            $sku->save();

            //Add the product to popular_products database
            $popular = PopularProducts::where('product_id', $cart->id)->first();
            if (!$popular) {
                $popular = new PopularProducts();
                $popular->total_purchased = $cart->qty;
                $popular->product_id = $cart->id;
            } else {
                $popular->total_purchased = $popular->total_purchased + $cart->qty;
            }
            $popular->save();

        }

        //destroy the cart session
        Cart::destroy();

        //send sms
        $new_number = substr_replace(Auth::user()->phone_number, '63', 0, (Auth::user()->phone_number[0] == '0'));
        $basic  = new \Nexmo\Client\Credentials\Basic('6d49c856', '6dsF7oesEXBWekMr');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => $new_number,
            'from' => 'KDotShop',
            'text' => 'Thanks for your purchase @ KdotShop Online thru Palawan Pawnshop. Total amount of purchased is PHP ' . number_format($order->total_amount,2)
        ]);
        //end send sms

        return Redirect::to('/shop-checkoutCompleted');

	}
}