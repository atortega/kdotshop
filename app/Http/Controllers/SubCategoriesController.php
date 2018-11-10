<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Datatables;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\SubCategories;

class SubCategoriesController extends Controller
{
    public function index()
    {

        $subcategories = Datatables::of(DB::table('sub_categories')
                            ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.category_id')

                        )
         
            ->addColumn('actions', function ($data) {
                return "
                	<button class='btn btn-xs btn-primary sub-category-edit-btn' sid='$data->sub_category_id'>Edit</button>
                    <button class='btn btn-xs btn-danger sub-category-delete-btn' sid='$data->sub_category_id' sname='$data->sub_category_name' >Delete</button>
                	";
            })
            ->escapeColumns('actions')
            ->make(true);


        return ($subcategories);

    }

    public function getIndex()
    {
        
        $categories = Categories::all();

        return View::make('admin.templates.sub-categories-create', compact('categories'));
        // or use this --> // return \View::make('admin.templates.sub-categories-create', compact('categories'));

        // $users = DB::table('categories')->get();
        // return view('user.index', ['users' => $users]);
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
            'category_name'       => 'bail|required|unique:categories,category_name|max:30',
            'sub-category' => 'required|max:30',
            'description' => 'required|max:100',
        ]);

        $subcategory = new SubCategories();
        $subcategory->category_id       = $request['category_name'];
        $subcategory->sub_category_name = $request['sub-category'];
        $subcategory->sub_category_desc = $request['description'];
        $subcategory->save();

        return redirect()->back()->with('message', 'New product sub category has been added.');
    }

    public function getProductSubCategoryById($id)
    {
        //return SubCategories::where('sub_category_id', $id)->first();
        $query = DB::table('sub_categories')
            ->leftJoin('categories', 'categories.category_id', '=', 'sub_categories.category_id')
            ->select('sub_categories.*', 'categories.category_name')
            ->where('sub_categories.sub_category_id', $id)
            ->get();
        return ($query);
    }

    public function getProductSubCategoriesByCategoryId()
    {

        $query = DB::table('categories')
            ->orderBy('categories.category_id', 'asc')
            ->get();

        // return SubCategories::where('category_id', $category_id)->get();

        return View::make('admin.templates.sub-categories-list',  compact('query'));
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
            'description' => 'required|max:200',
            'sub_category_id'       => 'required',
            'sub_category_name' => 'required',
        ]);

        $subcategory = SubCategories::where('sub_category_id', $request['sub_category_id'])->first();
        $subcategory->sub_category_name = $request['sub_category_name'];
        $subcategory->sub_category_desc = $request['description'];
        $subcategory->save();

        return array('error' => false, "message" => "Product sub category successfully updated!");
    }

    /*
     * Delete Product Category
     *
     * @param Array $request
     *
     * @return Array $return
     */
    public function deleteProductSubCategory(Request $request)
    {
        $request->validate([
            'sub_category_id' => 'required',
        ]);

        $subcategory = SubCategories::find($request['sub_category_id']);
        $subcategory->delete();

        return array('error' => false, "message"  => "Product sub category successfully deleted!");
    }

    public function getSubCategoryByCategoryId($cat)
    {
        $subcategory = SubCategories::where('category_id', $cat)->get();
        return $subcategory;
    }

    public function createSubCategoryForm()
    {
        $categories = Categories::orderBy('category_name')->get();

        return view('admin.templates.sub-categories-create', ['categories' => $categories]);
    }

    
    
}
