<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customers;
use App\Models\Orders;

class AdminController extends Controller
{
    public function index()
    {
        $total_customers = Customers::where('status', 'active')->count();
        $total_orders = Orders::count();

        $data = [
            'total_customers' => $total_customers,
            'total_orders' => $total_orders
        ];
        
        return view('admin.templates.index', $data);
    }
}
