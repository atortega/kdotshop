<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;

use App\Models\Sizes;

class SizesController extends Controller
{
     public function index()
	{
		$customers = Datatables::of(Sizes::query())
			->addColumn('actions', function ($data) {
                return "
                	<button class='btn btn-xs btn-primary size-edit-btn' sid='$data->size_id'>Edit</button>
                	<button class='btn btn-xs btn-danger size-delete-btn' sid='$data->size_id' sname='$data->size'>Delete</button>
                	";
            })
            ->escapeColumns('actions')
            ->make(true);
		
		return ($customers);
	}


	/*
	* Add new product size
	* 
	* @param Array $request
	* 
	* @return void
	*
	*/  
	public function addNew(Request $request)
	{
		$request->validate([
			'size' => 'bail|required|unique:sizes,size|max:3',
			'description' => 'required|max:100',
		]);

		$size = new Sizes();
		$size->size = strtoupper($request['size']);
		$size->description = $request['description'];
		$size->save();

		return redirect()->back()->with('message', 'New product size has been added.');
	}

	public function getProductSizeById($id)
    {
        return Sizes::where('size_id', $id)->first();
    }


    /*
     * Edit Product size
     *
     * @param Array $request
     *
     * @return Array $result
     */
    public function editProductSize(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100',
        ]);

        $size = Sizes::where('size_id', $request['size_id'])->first();
        $size->description = $request['description'];

        $size->save();

        return array('error' => false, "message"  => "Product size successfully updated!");
    }

    /*
     * Delete Product Size
     *
     * @param Array $request
     *
     * @return Array $return
     */
    public function deleteProductSize(Request $request)
    {
        $request->validate([
            'size_id' => 'required',
        ]);

        $size = Sizes::find($request['size_id']);
        $size->delete();

        return array('error' => false, "message"  => "Product size successfully deleted!");
    }
}
