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
use App\Models\Products;
use App\Models\PaymentDetails;
use App\Models\Payments;

class PurchaseController extends Controller
{
    public function index()
	{
        $orders = DB::table('orders')
            ->leftjoin('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->leftjoin('customer', 'orders.customer_id', '=', 'customer.customer_id')
            ->leftjoin('delivery_methods', 'orders.delivery_method_id', '=', 'delivery_methods.delivery_method_id')
            ->leftjoin('payments', 'payments.order_id', '=', 'orders.order_id')
            ->leftjoin('payment_methods', 'payments.payment_method_id', '=', 'payment_methods.payment_method_id')
            ->select('orders.*', 'order_details.product_name', 'order_details.quantity', 'payment_methods.payment_name',
                'delivery_methods.delivery_method_name', 'payments.reference_code')
            ->where('orders.customer_id', Auth::user()->customer_id)
            ->orderBy('orders.order_id', 'desc')
            ->get();

        $datatables = Datatables::of($orders)
            ->make(true);

        return ($datatables);
	}

	/* public function getPaymentDetailById($id = null)
    {
        $payment_details = PaymentDetails::where('payment_id', $id)->orderBy('product_name')->get();

        return ($payment_details);
    }*/

     public function getOrderDetailById($id = null)
    {
        /*
        $getOrderQuery = DB::table('orders')->where('order_id', '=', $id)->first();
        $getCustomersQuery = DB::table('customer')->where('customer_id', '=', $id)->first();
        $getPaymentMethodQuery = DB::table('payment_methods')->where('payment_method_id', '=', $id)->first();
        $getDeliveryMethodQuery = DB::table('delivery_methods')->where('delivery_methods_id', '=', $id)->first();
         */
        $order_details = OrderDetails::where('order_id', $id)->orderBy('product_name')->get();

        return ($order_details);
    }

}

