<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customers;
use App\Models\Orders;
use App\Models\Payments;

class AdminController extends Controller
{
    public function index()
    {
        $total_customers = Customers::where('status', 'active')->count();
        $total_orders = Orders::count();
        $total_income = Payments::whereNotNull('reference_code')->sum('amount');
        $payments = Payments::whereNotNull('reference_code')->orderBy('order_id', 'desc')->get()->take(8);

        $data = [
            'total_customers' => $total_customers,
            'total_orders' => $total_orders,
            'total_income' => $total_income,
            'payments'      => $payments
        ];

        return view('admin.templates.index', $data);
    }
}
