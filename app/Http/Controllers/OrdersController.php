<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;

use App\Models\Orders;

class OrdersController extends Controller
{
    public function index()
	{
		$orders = Datatables::of(Orders::query())
            ->addColumn('actions', function ($data) {
                return "
                	<button class='btn btn-xs btn-primary size-edit-btn' sid='$data->color_id'>Edit</button>
                    <button class='btn btn-xs btn-danger size-delete-btn' sid='$data->color_id' sname='$data->color'>Delete</button>
                	";
            })
            ->escapeColumns('actions')
            ->make(true);
		
		return ($orders);
	}
}
