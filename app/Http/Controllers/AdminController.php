<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

    public function getMorrisBarData()
    {
        /*
        $query = Payments::all()
            ->groupBy(function ($proj) {
                return $proj->date_paid->format('Ymd');
            })
            ->map(function ($day) {
                return $day->sum('amount');
            });
        */
        $orders = DB::select('SELECT DAY(order_date) as day, SUM(total_amount) as total FROM orders GROUP BY DAY(order_date)');

        foreach($orders AS $row) {
            if (is_null($row->day)) continue;
            $data[] = ['y' => $row->day, 'a' => $row->total, 'b' => 0];
        }

        $paidOrders = DB::select('SELECT DAY(date_paid) as day, SUM(amount) as total FROM payments where reference_code is not null GROUP BY DAY(date_paid)');

        foreach($paidOrders AS $paid) {
            foreach($data AS &$line) {
                if ($paid->day == $line['y']) {
                    $line['b'] = $paid->total;
                }
            }
        }
        return json_encode($data);
    }
}
