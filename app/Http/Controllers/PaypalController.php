<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

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

class PaymentController extends Controller
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

	public function index()
	{
		return view('customer.paypal.paywithpaypal');
	}

	public function payWithpaypal(Request $request)
	{
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$item_1 = new Item();

		$item_1->setName('Item 1') /** item name **/
			->setCurrency('PHP')
			->setQuantity(1)
			// ->setSku("123123") Similar to `item_number` in Classic API
			->setPrice($request->get('amount')); /** unit price **/

		$item_list = new ItemList();
		$item_list->setItems(array($item_1));

		$details = new Details();
		// $details->setShipping(1.2)
		// 	->setTax(1.3)
		// 	->setSubtotal(17.50);

		$amount = new Amount();
		$amount->setCurrency("PHP")
			->setTotal($request->get('amount'));
			// ->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription("Your transaction description")
			->setInvoiceNumber(uniqid());

		// $baseUrl = getBaseUrl();
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(URL::to('customer/paypal/status')) /** Specify return URL **/
			->setCancelUrl(URL::to('customer/paypal'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));
			/** dd($payment->create($this->_api_context));exit; **/
		try {

		    $payment->create($this->_api_context);

		} catch (\PayPal\Exception\PayPalConnectionException $e) {

			if(\Config::get('app.debug')){
				\Session::put('error', 'Connection timeout');
				return Redirect::to('/');
			}else{

				\Session::put('error', 'Some error have occured, sorry for the inconvenience');
				return Redirect::to('/');
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
		return Redirect::to('/');
	}

	public function getPaymentStatus(Request $request)
	{
		/** Get the payment ID before session clear **/
		$payment_id = Session::get('paypal_payment_id');

		/** clear the session payment ID **/
		Session::forget('paypal_payment_id');

		if(empty(Input::get('PayerID')) || empty(Input::get('token'))) {
			\Session::put('error', 'Payment failed');
			return Redirect::to('/');
		}

		$payment = Payment::get($payment_id, $this->_api_context);
		$execution = new PaymentExecution();
		$execution->setPayerId(Input::get('PayerID'));

		/** Execute the payment **/
		$result = $payment->execute($execution, $this->_api_context);

		if($result->getState() == 'approved') {
			\Session::put('success', 'Payment success');
			return Redirect::to('/');
		}

		\Session::put('error', 'Payment failed');
		return Redirect::to('/');
	}
}