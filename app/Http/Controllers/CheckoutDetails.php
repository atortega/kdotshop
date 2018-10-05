<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Billing_information;

class CheckoutDetails extends Controller
{
    public function billingInfo(Request $request)
    {
    	$billInfo = new Billing_information;
		
		$billInfo->first_name 		= $request['first_name'];
		$billInfo->last_name 		= $request['last_name'];
		$billInfo->contact_number 	= $request['contact_number'];
		$billInfo->email 			= $request['email'];
		$billInfo->address 			= $request['address'];
		$billInfo->country 			= $request['country'];
		$billInfo->city 			= $request['city'];
		$billInfo->zip_code 		= $request['zip_code'];

		$billInfo->save();
		return redirect::back();
    }
}
