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
            ->editColumn('shipping_fee', function ($data) {
                return number_format($data->shipping_fee, 2);
            })
            ->editColumn('km', function ($data) {
                return number_format($data->km, 1);
            })
            ->addColumn('actions', function ($data) {
                return "
                        <button class='btn btn-xs btn-primary fees-edit-btn' sid='$data->id'>Edit</button>
                        <button class='btn btn-xs btn-success fees-delete-btn' sid='$data->id' sname='$data->place'>Delete</button>
                        ";
            })
            ->escapeColumns('actions')
            ->make(true);

        return ($datatables);
    }

    /*
     * Get Shipping Fee by ID
     *
     * @Param Int $id
     *
     * @return array
     */
    public function getShippingFeeById($id)
    {
        $fee = Places::where('id', $id)->first();
        return $fee;
    }

    /*
     * Update Shipping Fee
     *
     * @param Request $request
     *
     * @@return void
     */
    public function editShippingFee(Request $request)
    {
        $request->validate([
            'id'            => 'required|integer|min:1',
            'place'         => 'required|string|max:100',
            'distance'      => 'required|numeric',
            'shipping_fee'  => 'required|numeric'
        ]);

        $fee = Places::where('id', $request->id)->first();
        $fee->place         = $request->place;
        $fee->km            = $request->distance;
        $fee->shipping_fee  = $request->shipping_fee;
        $fee->save();

        return array('error' => false, "message"  => "Shipping fee successfully updated!");
    }

    /*
     * Delete Shipping Fee
     *
     * @param Array $request
     *
     * @return Array $return
     */
    public function deleteShippingFee(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $fee = Places::where('id', $request->id)->first();
        $fee->delete();

        return array('error' => false, "message"  => "Shipping fee successfully deleted!");
    }

    /*
     * Add Shipping Fee
     *
     * @param Request $request
     *
     * @return void
     */
    public function addShippingFee(Request $request)
    {
        $request->validate([
            'place'         => 'required|string|max:100',
            'distance'      => 'required|numeric',
            'shipping_fee'  => 'required|numeric'
        ]);

        $fee = new Places();
        $fee->place         = $request->place;
        $fee->km            = $request->distance;
        $fee->shipping_fee  = $request->shipping_fee;
        $fee->save();

        return redirect()->back()->with('message', 'New shipping fee has been added.');
    }

}
