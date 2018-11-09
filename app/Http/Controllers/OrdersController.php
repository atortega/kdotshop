<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use File;
use Image;
use Datatables;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Country;
use App\Models\CustomersAddress;
use App\Models\Delivery_methods;
use App\Models\Payments;
use App\Models\Payment_methods;

use App\Models\Orders;

class OrdersController extends Controller
{
    public function index()
    {
        $customer = Customers::orderBy('first_name')->get();
        $delivery_methods = Delivery_methods::orderBy('delivery_method_name')->get();

        /*$payment_methods = DB::table('payment_methods')
            ->join('orders', 'order_id', '=', 'payments.payment_id')
            ->join('payment_methods', 'payment_methods.payment_method_id', '=', 'orders.order_id')
            ->select('payment_method_name')
            ->get();*/

        $orders = DB::table('orders')
            ->leftjoin('customer', 'orders.customer_id', '=', 'customer.customer_id')
            ->leftjoin('delivery_methods', 'orders.delivery_method_id', '=', 'delivery_methods.delivery_method_id')
            ->leftjoin('payments', 'payments.order_id', '=', 'orders.order_id')
            ->leftjoin('payment_methods', 'payments.payment_method_id', '=', 'payment_methods.payment_method_id')
            ->select('orders.*', 'customer.first_name', DB::raw("concat(customer.first_name, ' ', customer.last_name) as customer_name"), 'delivery_methods.delivery_method_name', 'payment_methods.payment_name', 'payments.reference_code')
            ->orderBy('orders.order_id', 'desc')
            ->get();

        $datatables = Datatables::of($orders)
            ->addColumn('actions', function ($data) {
                    return "
                        <button class='btn btn-xs btn-primary orders-edit-btn' sid='$data->order_id'>Details</button>
                        <button class='btn btn-xs btn-success orders-tracker-btn' sid='$data->order_id'>Tracker</button>
                        <button class='btn btn-xs btn-success orders-update-btn' sid='$data->order_id' data-status='$data->status' data-reference='$data->reference_code'>Update Order</button>
                        ";
                })
                ->escapeColumns('actions')
                ->make(true);

        return ($datatables);
    }

    public function getOrdersById($id)
    {
        $order = Orders::where('order_id', id)->first();

        return $order;
    }

    public function getOrderDetailById($id = null)
    {
        /*
        $getOrderQuery = DB::table('orders')->where('order_id', '=', $id)->first();
        $getCustomersQuery = DB::table('customer')->where('customer_id', '=', $id)->first();
        $getPaymentMethodQuery = DB::table('payment_methods')->where('payment_method_id', '=', $id)->first();
        $getDeliveryMethodQuery = DB::table('delivery_methods')->where('delivery_methods_id', '=', $id)->first();
         */
        $order_details = OrderDetails::where('order_id', $id)->orderBy('product_name')->get();
        $order_details = OrderDetails::where('order_id', $id)->orderBy('color')->get();
        $order_details = OrderDetails::where('order_id', $id)->orderBy('size')->get();
        return ($order_details);
    }

    public function paginateProducts(Request $request)
    {
        $sortorder = 'ASC';
        $sortby = 'products.created_at';
        $perpage    = $request->has('perpage') ? $request['perpage'] : 10;

        if ($request->has('sortby')){
            if($request['sortby'] == 'order') {
                $sortby = 'orders.order_date';
            }
        }
        if ($request->has('sortordert')) {
            if ($request['sortorder'] == 'ASC') {
                $sortorder = 'ASC';
            } else {
                $sortorder = 'DESC';
            }
        }

        $query = DB::table('orders')
            ->leftjoin('customer', 'orders.order_id', '=', 'customer.customer_id')
            ->leftjoin('delivery_methods', 'orders.order_id', '=', 'delivery_methods.delivery_method_id')
            ->select('orders.*', 'customer.first_name', 'delivery_methods.delivery_method_name')
            ->orderBy($sortby, $sortorder);

        $result = $query->paginate($perpage);

        $perpage_array = [10, 25, 50, 100];

    }

    public function getOrderTrackers($order_id) {
        $query = DB::table('order_trackers')
            ->leftJoin('payments', 'payments.order_id', 'order_trackers.order_id')
            ->where('order_trackers.order_id', $order_id)
            ->orderByDesc('order_trackers.order_tracker_id')
            ->select('order_trackers.*', 'payments.reference_code')
            ->get();

        return $query;
    }
}