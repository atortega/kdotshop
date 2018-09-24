<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;

use App\Models\Colors;

class ColorsController extends Controller
{
    public function index()
	{
		$colors = Datatables::of(Colors::query())
			->addColumn('actions', function ($data) {
                return "
                	<button class='btn btn-xs btn-primary color-edit-btn' sid='$data->color_id'>Edit</button>
                    <button class='btn btn-xs btn-danger color-delete-btn' sid='$data->color_id' sname='$data->color'>Delete</button>
                	";
            })
            ->escapeColumns('actions')
            ->make(true);
		
		return ($colors);
	}

    /*
	* Add new product color
	*
	* @param Array $request
	*
	* @return void
	*
	*/
    public function addNew(Request $request)
    {
        $request->validate([
            'color' => 'bail|required|unique:colors,color|max:30',
            'description' => 'required|max:100',
        ]);

        $size = new Colors();
        $size->color = strtoupper($request['color']);
        $size->description = $request['description'];
        $size->save();

        return redirect()->back()->with('message', 'New product size has been added.');
    }

    public function getProductColorById($id)
    {
        return Colors::where('color_id', $id)->first();
    }

    /*
     * Edit Product color
     *
     * @param Array $request
     *
     * @return Array $result
     */
    public function editProductColor(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100',
        ]);

        $color = Colors::where('color_id', $request['color_id'])->first();
        $color->description = $request['description'];

        $color->save();

        return array('error' => false, "message"  => "Product color successfully updated!");
    }

    /*
     * Delete Product Color
     *
     * @param Array $request
     *
     * @return Array $return
     */
    public function deleteProductColor(Request $request)
    {
        $request->validate([
            'color_id' => 'required',
        ]);

        $color = Colors::find($request['color_id']);
        $color->delete();

        return array('error' => false, "message"  => "Product color successfully deleted!");
    }
}
