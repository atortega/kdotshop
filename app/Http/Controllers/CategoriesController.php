<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;

use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {

        $categories = Datatables::of(Categories::query())
            ->addColumn('actions', function ($data) {
                return "
                	<button class='btn btn-xs btn-primary category-edit-btn' sid='$data->category_id'>Edit</button>
                    <button class='btn btn-xs btn-danger category-delete-btn' sid='$data->category_id' sname='$data->category_name'>Delete</button>
                	";
            })
            ->escapeColumns('actions')
            ->make(true);

        return ($categories);
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
            'category' => 'bail|required|unique:categories,category_name|max:30',
            'description' => 'required|max:100',
            'category_image' => 'required',
        ]);

        $category = new Categories();
        $category->category_name = $request['category'];
        $category->category_desc = $request['description'];
        $category->category_image = $request['category_image'];
        $category->save();

        return redirect()->back()->with('message', 'New product category has been added.');
    }

    public function getProductCategoryById($id)
    {
        return Categories::where('category_id', $id)->first();
    }

    /*
     * Edit Product Category
     *
     * @param Array $request
     *
     * @return Array $result
     */
    public function editProductCategory(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100',
            'category_image' =>'required',
        ]);

        $category = Categories::where('category_id', $request['category_id'])->first();
        $category->category_desc = $request['description'];
        $category->category_image = $request['category_image'];

        $category->save();

        return array('error' => false, "message"  => "Product category successfully updated!");
    }

    /*
     * Delete Product Category
     *
     * @param Array $request
     *
     * @return Array $return
     */
    public function deleteProductCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);

        $category = Categories::find($request['category_id']);
        $category->delete();

        return array('error' => false, "message"  => "Product category successfully deleted!");
    }
}
