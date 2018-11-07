<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Image;
use Datatables;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Sku;
use App\Models\Customers;
use App\Models\Delivery_methods;
use App\Models\Delivery_addresses;
use App\Models\Sub_categories;

class DeliveryController extends Controller
{
    public function index()
    {
    	$delivery = DB::table('orders')
            ->leftjoin('customer', 'orders.customer_id', '=', 'customer.customer_id')
            ->leftjoin('customers_address', 'customers_address.customer_id', '=', 'customer.customer_id')
            ->leftjoin('delivery_methods', 'orders.delivery_method_id', '=', 'delivery_methods.delivery_method_id')
            ->leftjoin('payments', 'payments.order_id', '=', 'orders.order_id')
            ->leftjoin('payment_methods', 'payments.payment_method_id', '=', 'payment_methods.payment_method_id')
            ->select('orders.*', 'delivery_methods.delivery_method_name', DB::raw("concat(customers_address.shipping_address1, ' ', customers_address.shipping_barangay, ' ', customers_address.shipping_city, ' ', customers_address.shipping_province, ' ', customers_address.shipping_zipcode, ' ', customers_address.shipping_country) as delivery_address"), DB::raw("concat(customer.first_name, ' ', customer.last_name) as customer_name"), 'payment_methods.payment_name' )
            ->get();

           $datatables = Datatables::of($delivery)
            ->addColumn('actions', function ($data) {
                    return "
                        <button class='btn btn-xs btn-primary orders-edit-btn' sid='$data->order_id'>View Details</button>
                        ";
                })
                ->escapeColumns('actions')
                ->make(true);

        return ($datatables);
    }
}
