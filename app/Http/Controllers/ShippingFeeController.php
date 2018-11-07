<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

use App\Models\Places;

class ShippingFeeController extends Controller
{
    public function index()
    {
        $fees = DB::table('places')
            ->orderBy('places.place', 'asc')
            ->select('places.*')
            ->get();

        $datatables = Datatables::of($fees)
            ->addColumn('actions', function ($data) {
                return "
                        <button class='btn btn-xs btn-primary fees-edit-btn' sid='$data->id'>Edit</button>
                        <button class='btn btn-xs btn-success fees-tracker-btn' sid='$data->id'>Delete</button>
                        ";
            })
            ->escapeColumns('actions')
            ->make(true);

        return ($datatables);
    }

    public function getShippingFeeById($id)
    {
        $fee = Places::where('id', $id)->first();
        return $fee;
    }
}
