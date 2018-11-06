<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use File;
use Image;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Country;
use App\Models\CustomersAddress;
use App\Models\Delivery_methods;
use App\Models\Payment_methods;
use App\Models\Orders;

use App\Models\Payments;

class PaymentsController extends Controller
{
    public function index()
	{
		$orders = Orders::orderBy('order_id')->get();
		$payment_method = Payment_methods::orderBy('payment_name')->get();
		$total_amount = Orders::orderBy('total_amount')->get();

		$payments = DB::table('payments')
			->leftjoin('payment_methods', 'payments.payment_method_id', '=', 'payment_methods.payment_method_id')
			->leftjoin('orders', 'payments.order_id', '=', 'orders.order_id')
			->leftjoin('customer', 'orders.customer_id', '=', 'customer.customer_id')
			->select('payments.*', 'orders.order_id', 'customer.first_name', 'customer.phone_number', 'payment_methods.payment_name', 'orders.total_amount')
			->get();

		$datatables = Datatables::of($payments)
		            ->addColumn('actions', function ($data) {
		                    return "
		                        <button class='btn btn-xs btn-primary size-edit-btn' sid='$data->order_id'>View Details</button>
		                        ";
		                })
		                ->escapeColumns('actions')
		                ->make(true);

		return ($datatables);
	}
}
