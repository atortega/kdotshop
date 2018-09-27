<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;
use DB;

use App\Models\SubCategories;

class SubCategoriesController extends Controller
{
    public function index()
    {
        $subCategories = DB::table('sub_categories')
            ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.category_id')
            ->select('sub_categories.*','categories.category_name')
            ->get();

        $datatables = Datatables::of($subCategories)
            ->addColumn('actions', function ($data) {
                return "
                	<button class='btn btn-xs btn-primary category-edit-btn' sid='$data->category_id' data-subcat='" . json_encode($data) . "'>Edit</button>
                    <button class='btn btn-xs btn-danger category-delete-btn' sid='$data->category_id' sname='$data->category_name'>Delete</button>
                	";
            })
            ->escapeColumns('actions')
            ->make(true);

        return ($datatables);
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
        ]);

        $category = new Categories();
        $category->category_name = $request['category'];
        $category->category_desc = $request['description'];
        $category->save();

        return redirect()->back()->with('message', 'New product category has been added.');
    }

    public function getProductSubCategoriesByCategoryId($category_id)
    {
        return SubCategories::where('category_id', $category_id)->get();
    }

    /*
     * Edit Product Category
     *
     * @param Array $request
     *
     * @return Array $result
     */
    public function editProductSubCategory(Request $request)
    {
        $request->validate([
            'sub_category_id'   => 'integer|required',
            'sub_category_name' => 'required|string',
            'description' => 'string|max:100'
        ]);

        $subcat = SubCategories::where('sub_category_id', $request['sub_category_id'])->first();

        $subcat->sub_category_name  = $request['sub_category_name'];
        $subcat->sub_category_desc      = $request['description'];
        $subcat->save();

        return array('error' => false, "message"  => "Product sub category successfully updated!");
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
