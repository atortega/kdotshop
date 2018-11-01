<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Image;
use Datatables;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Sku;
use App\Models\Sub_categories;
class SkuController extends Controller
{
    public function index()
    {
        $skus = DB::table('sku')
            ->leftJoin('products', 'sku.product_id', 'products.product_id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.sub_category_id')
            ->leftJoin('colors', 'colors.color_id', 'sku.color_id')
            ->leftJoin('sizes', 'sizes.size_id', 'sku.size_id')
            ->select('sku.*', 'categories.category_name', 'sub_categories.sub_category_name', 'products.product_name', 'products.product_image', 'colors.color', 'sizes.size', 'sku.number_of_items as quantity', 'sku.unit_price as price')
            ->get();

        $datatables = Datatables::of($skus)
            ->addColumn('actions', function ($data) {
                return "
                    <div align='center'>
                        <button class='btn btn-xs btn-primary sku-edit-btn'
                            sid='$data->id'>Edit</button>
                        <button class='btn btn-xs btn-danger sku-delete-btn'
                            sid='$data->id' sname='$data->product_name'>Delete</button>
                    </div>
                    ";
            })
            ->escapeColumns('actions')
            ->make(true);
        return ($datatables);

    }

    /*
     * List SKU
     */
    public function listSKUs()
    {
        $categories = Categories::orderBy('category_name')->get();
        $sub_categories = Sub_categories::orderBy('sub_category_name')->get();
        $colors = Colors::orderBy('color')->get();
        $sizes = Sizes::orderBy('size')->get();
        $data = [
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'colors' => $colors,
            'sizes' => $sizes
        ];
        return view('admin.templates.sku-list', $data);
    }

    /*
     * Get SKU by ID
     *
     * @param Int $id
     *
     * @return array
     */
    public function getSkuByID($sku_id)
    {
        $sku = DB::table('sku')
            ->leftJoin('products', 'sku.product_id', 'products.product_id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.sub_category_id')
            ->select('sku.*', 'products.product_name', 'categories.category_name', 'sub_categories.sub_category_name', 'products.product_image')
            ->where('sku.id', $sku_id)
            ->get();
        return $sku;

    }

    /*
     * Update SKU
     *
     * @param Array $request
     *
     * @return void
     */
    public function editSKU(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $sku = Sku::where('id', $request->sku_id)->first();

        $sku->color_id = $request->color;
        $sku->size_id = $request->size;
        $sku->number_of_items = $request->quantity;
        $sku->unit_price = $request->price;

        $sku->save();

        return array('error' => false, "message"  => "Product SKU successfully updated!");
    }

    /*
     * Create SKU Form
     *
     */
    public function createSkuForm()
    {
        $products = Products::orderBy('product_name', 'asc')->get();
        $colors = Colors::orderBy('color')->get();
        $sizes = Sizes::orderBy('size')->get();

        return view('admin.templates.sku-create', ['products' => $products, 'colors' => $colors, 'sizes' => $sizes]);
    }

    /*
     * Add New SKU
     *
     * @param Array $request
     *
     * @return void
     */
    public function addNewSKU(Request $request)
    {
        $request->validate([
            'product' => 'required|integer',
            'price' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        //get product
        $product = Products::where('product_id', $request->product)->first();

        //check for duplicate
        $check = Sku::where('product_id', $request->product)
            ->where('color_id', $request->color)
            ->where('size_id', $request->size)
            ->first();

        if (!is_null($check)) {
            return redirect()->back()->withErrors('message', 'Duplicate Entry');
        }

        $padded_id = str_pad($request->product, 10, '0', STR_PAD_LEFT);
        $product_sku = $product->category_id . $product->sub_category_id . $request->color . $request->size . $padded_id;

        $sku = new Sku();
        $sku->sku = $product_sku;
        $sku->product_id = $request->product;
        $sku->color_id = $request->color;
        $sku->size_id = $request->size;
        $sku->number_of_items = $request->quantity;
        $sku->unit_price = $request->price;

        $sku->save();
        return redirect()->back()->with('message', 'New product SKU has been added.');
    }
}
