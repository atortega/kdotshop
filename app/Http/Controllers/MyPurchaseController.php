<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
class MyPurchaseController extends Controller
{
    public function index()
	{
		$orders = Orders::orderBy('order_id')->get();
		$payment_method = Payment_methods::orderBy('payment_name')->get();
		$total_amount = Orders::orderBy('total_amount')->get();
		$products = Products::orderBy('product_name')->get();
		$delivery_methods = Delivery_methods::orderBy('delivery_methods_name')->get();


		$payments = DB::table('payments')
			->leftjoin('payment_methods', 'payments.payment_method_id', '=', 'payment_methods.payment_method_id')
			->leftjoin('order_details', 'products.product_id', '=', 'order_details.product_id' )
			->leftjoin('orders', 'payments.order_id', '=', 'orders.order_id')
			->select('orders.*', 'orders.order_id', 'payments.date_paid','products.product_name',  'payment_methods.payment_name', 'delivery_methods.delivery_methods_name','payments.reference_code','orders.total_amount')
			->get();

		$datatables = Datatables::of($payments)
		            

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
}
