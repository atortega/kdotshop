<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Gloudemans\Shoppingcart\Facades\Cart;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use Illuminate\Support\Facades\Auth;

/** All PayPal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

use App\Models\Orders;
use App\Models\Payments;
use App\Models\Invoices;
use App\Models\OrderDetails;

class PaypalController extends Controller
{
	private $_api_context;

	public function __construct()
	{
		/** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

	}

	// public function index()
	// {
	// 	return view('customer.paypal.paywithpaypal');
	// }

	public function payWithPaypal()
	{
		// API
		// Documentation: http://paypal.github.io/PayPal-PHP-SDK/sample/doc/payments/CreatePaymentUsingPayPal.html

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		// trying to set an array of data, in which items are found in Cart...
		$data = [];
		$data['items'] = [];

		// supposedly, this is to fetch data from Cart::content
		foreach(Cart::content() as $cart){

			$item_detail = new Item();

            $item_detail->setName($cart->name) /** item name **/
			->setCurrency('PHP')
			->setQuantity($cart->qty)
			//->setSku("123123") // Similar to `item_number` in Classic API
			->setPrice($cart->price); /** unit price **/

			$data['items'][]=$item_detail;
		}

		$item_list = new ItemList();
		$item_list->setItems(array($data));

		$details = new Details();
		// $details->setShipping(1.2)
		$details->setTax(0)
		 	->setSubtotal((float) str_replace(",", "", Cart::total()));

		$amount = new Amount();
		$amount->setCurrency("PHP")
			->setTotal((float) str_replace(",", "", Cart::total()))
			->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($data)
			->setDescription("Your transaction description")
			->setInvoiceNumber(uniqid());

		// $baseUrl = getBaseUrl();
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(URL::to('/paypal/status')) /** Specify return URL **/
			->setCancelUrl(URL::to('/'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions([$transaction]);

		try {

		    $payment->create($this->_api_context);

		} catch (\PayPal\Exception\PayPalConnectionException $e) {

			if(\Config::get('app.debug')){
				\Session::put('error', 'Connection timeout');
				return Redirect::to('/shop-checkoutPayment');
			}else{

				\Session::put('error', 'Some error have occured, sorry for the inconvenience');
				return Redirect::to('/shop-checkoutPayment');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		/** add payment ID to session **/
		Session::put('paypal_payment_id', $payment->getId());

		if(isset($redirect_url)) {
			/** redirect to paypal **/
			return Redirect::away($redirect_url);
		}

		\Session::put('error', 'Unknown error occured');
		return Redirect::to('/shop-checkoutPayment');
	}

	public function getPaymentStatus(Request $request)
	{
		/** Get the payment ID before session clear **/
		$payment_id = Session::get('paypal_payment_id');

		/** clear the session payment ID **/
		Session::forget('paypal_payment_id');

		if(empty(Input::get('PayerID')) || empty(Input::get('token'))) {
			\Session::put('error', 'Payment failed');
			return Redirect::to('/shop-checkoutPayment');
		}

		$payment = Payment::get($payment_id, $this->_api_context);
		$execution = new PaymentExecution();
		$execution->setPayerId(Input::get('PayerID'));

		/** Execute the payment **/
		$result = $payment->execute($execution, $this->_api_context);

		if($result->getState() == 'approved') {
			//\Session::put('success', 'Payment success');

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
            $order->total_amount            = str_replace(",", "", Cart::total());
            $order->status                  = 'approved';
            $order->save();

            //insert data to payment table
            $payment = new Payments();
            $payment->payment_method_id = 1;
            $payment->order_id          = $order->order_id;
            $payment->amount            = str_replace(",", "", Cart::total());
            $payment->reference_code    = $result->getId();
            $payment->save();

            //insert data to Invoice table
            $invoice = new Invoices();
            $invoice->payment_id    = $payment->payment_id;
            $invoice->date          = date('Y-m-d');
            $invoice->save();

            //update the invoice number at payment table
            $payment->invoice_number = $invoice->invoice_number;
            $payment->save();

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

                $order_details->save();
            }

            //destroy the cart session
            Cart::destroy();

			return Redirect::to('/shop-checkoutCompleted');
		}

		\Session::put('error', 'Payment failed');
		return Redirect::to('/shop-checkoutPayment');
	}
}