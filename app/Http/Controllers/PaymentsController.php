<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;

use App\Models\Payments;

class PaymentsController extends Controller
{
    public function index()
	{
		$payments = Datatables::of(Payments::query())
			->addColumn('actions', function ($data) {
                //return "<a class='btn btn-xs btn-success' href='/admin/payments/edit/$data->customer_id'>Edit</a>";
                return "Edit";
            })->make(true);
		
		return ($payments);
	}
}
