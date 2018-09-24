<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Datatables;
use DB;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Sub_categories;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Sku;

class ProductsController extends Controller
{
    public function index()
	{
		//$products = Datatables::of(Products::query())->make(true);

        //$products = Datatables::of(Products::get_products())->make(true);
        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.sub_category_id')
            ->leftJoin('sku', 'products.product_id', '=', 'sku.product_id')
            ->leftJoin('colors', 'sku.color_id', '=', 'colors.color_id')
            ->leftJoin('sizes', 'sku.size_id', '=', 'sizes.size_id')
            ->select('products.*', 'categories.category_name', 'sub_categories.sub_category_name', 'sku.color_id', 'sku.size_id', 'sku.sku', 'colors.color', 'sizes.description AS size', 'sku.number_of_items AS quantity', 'sku.unit_price')
            ->get();

        $datatables = Datatables::of($products)
            ->addColumn('actions', function ($data) {
                return "
                    <button class='btn btn-xs btn-primary product-edit-btn' sid='$data->product_id' data-product=' " . json_encode($data) . "'>Edit</button>
                    <button class='btn btn-xs btn-danger product-delete-btn' sid='$data->product_id' sname='$data->product_name'>Delete</button>
                    ";
            })
            ->escapeColumns('actions')
            ->make(true);

		return ($datatables);
	}

	/*
	 * Create New Product
	 *
	 * @return View
	 */
	public function createProduct()
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

        return view('admin.templates.products-create', $data);
    }


    /*
     * Insert new Product from form
     *
     * @param Array $request
     *
     * @return void
     *
     */
    public function addNewProduct(Request $request)
    {
        $request->validate([
            'category'      => 'required',
            'product_name'  => 'required|max:100',
            'quantity'      => 'numeric|min:1',
            'price'         => 'numeric|min:1'
        ]);

        $path = Storage::putFile('products/images', $request->product_image, 'public');

        $path_array = explode('/', $path);
        $file = $path_array[count($path_array)-1];

        /*
        $img = Image::make('public/storage/' . $path);
        $img->resize(150, 150);
        $img->save('public/storage/products/images/thumbs' . $file);
        */

        $product                    = new Products();
        $product->category_id       = $request->category;
        $product->sub_category_id   = $request->sub_category;
        $product->product_name      = $request->product_name;
        $product->product_desc      = $request->description;
        $product->originalfilename  = addslashes($request->product_image->getClientOriginalName());
        $product->filesize          = $request->product_image->getClientSize();
        $product->product_image     = $path;

        $product->save();

        //save data to SKU table
        $padded_id = str_pad($product->product_id, 10, '0', STR_PAD_LEFT);
        $product_sku = $request->category . $request->sub_category . $request->color . $request->size . $padded_id;

        $sku                    = new SKU;
        $sku->sku               = $product_sku;
        $sku->product_id        = $product->product_id;
        $sku->color_id          = $request->color;
        $sku->size_id           = $request->size;
        $sku->number_of_items   = $request->quantity;
        $sku->unit_price        = $request->price;
        $sku->save();

        return redirect()->back()->with('message', 'New product has been added.');
    }

    public function productLists()
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

        return view('admin.templates.products-list', $data);
    }

    public function updateProduct(Request $request)
    {
        $request->validate([
            'category'      => 'required',
            'product_name'  => 'required|max:100',
            'quantity'      => 'numeric|min:1',
            'price'         => 'numeric|min:1'
        ]);

        if ($request->product_image) {
            $path = Storage::putFile('products/images', $request->product_image, 'public');
        }

        $product = Products::where('product_id', $request->product_id)->first();
        if (!$product) {
            return redirect()->back()->with('message', 'Product Not found!');
        }

        $product->category_id       = $request->category;
        $product->sub_category_id   = $request->sub_category;
        $product->product_name      = $request->product_name;
        $product->product_desc      = $request->description;
        if ($request->product_image) {
            $product->originalfilename = addslashes($request->product_image->getClientOriginalName());
            $product->filesize = $request->product_image->getClientSize();
            $product->product_image = $path;
        }

        $product->save();

        return redirect()->back()->with('message', 'New product has been added.');
    }

    public function deleteProduct(Request $request)
    {
        $request->validate([
            'product_id'      => 'required'|integer
        ]);

        $product = Products::where('product_id', $request->product_id)->first();
        if (!$product) {
            return redirect()->back()->with('message', 'Product Not found!');
        }

        $product->delete();
    }

}
