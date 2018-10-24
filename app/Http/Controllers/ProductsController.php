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
class ProductsController extends Controller
{
    public function index()
    {
        //$products = Datatables::of(Products::query())->make(true);
        //$products = Datatables::of(Products::get_products())->make(true);
        $categories = Categories::orderBy('category_name')->get();
        $sub_categories = Sub_categories::orderBy('sub_category_name')->get();
        $colors = Colors::orderBy('color')->get();
        $sizes = Sizes::orderBy('size')->get();

        $products = DB::table('products')
            ->leftJoin('categories', 'products.product_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.product_id', '=', 'sub_categories.sub_category_id')
            ->select('products.*', 'categories.category_name', 'sub_categories.sub_category_name')
            ->get();
        $datatables = Datatables::of($products)
            ->addColumn('actions', function ($data) {
                return "
                    <div align='center'>
                        <button class='btn btn-xs btn-primary product-edit-btn'
                            sid='$data->product_id'>Edit</button>
                        <button class='btn btn-xs btn-danger product-delete-btn'
                            sid='$data->product_id' sname='$data->product_name'>Delete</button>
                    </div>
                    ";
            })
            ->escapeColumns('actions')
            ->with([
                'categories' => $categories,
                'sub_categories' => $sub_categories,
                'colors' => $colors,
                'sizes' => $sizes
            ])
            ->make(true);
        return ($datatables);
    }
    public function getProductById($id)
    {
        //$product = Products::where('product_id', $id)->first();


        $product = DB::table('products')
            ->leftJoin('categories', 'products.product_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.product_id', '=', 'sub_categories.sub_category_id')
            ->leftJoin('sku', 'products.product_id', '=', 'sku.product_id')
            ->select('products.*', 'categories.category_name', 'sub_categories.sub_category_name', 'sku.color_id', 'sku.size_id', 'sku.number_of_items', 'sku.unit_price')
            ->where('products.product_id', $id)
            ->get();

        return $product;
        
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
     * List Products
     */
    public function listProducts()
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
            'price'         => 'numeric|min:1',

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

    /*
     * update Products
     */
    public function updateProduct(Request $request)
    {
        $request->validate([
            'product_id'    => 'required|numeric|min:1',
            'category_id'      => 'required',
            'product_name'  => 'required|max:100',
            'quantity'      => 'numeric|min:1',
            'price'         => 'numeric|min:1',

        ]);

        //$path = Storage::putFile('templates/images', $request->product_image, 'public');
        //$path_array = explode('/', $path);

        $path = '';

        $product = Products::where('product_id', $request->product_id)->first();

        $product->category_id       = $request->category_id;
        $product->sub_category_id   = $request->sub_category_id;
        $product->product_name      = $request->product_name;
        $product->product_desc      = $request->product_desc;
        //$product->originalfilename  = addslashes($request->product_image->getClientOriginalName());
        //$product->filesize          = $request->product_image->getClientSize();
        $product->originalfilename  = '';
        $product->filesize          = '0';
        $product->product_image     = $path;
        $product->save();

        //save data to SKU table
        $sku = Sku::where('product_id', $request->product_id)->first();
        if (!$sku) {
            $sku = new Sku();
        }
        $padded_id = str_pad($request->product_id, 10, '0', STR_PAD_LEFT);
        $product_sku = $request->category_id . $request->sub_category_id . $request->color . $request->size . $padded_id;
        $sku->sku               = $product_sku;
        $sku->product_id        = $request->product_id;
        $sku->color_id          = $request->color;
        $sku->size_id           = $request->size;
        $sku->number_of_items   = $request->quantity;
        $sku->unit_price        = $request->price;
        $sku->save();

        return array('error' => false, "message"  => "Product successfully updated!");
    }
    
    public function getProductDetailsById($id = null)
    {

        $getProductQuery = DB::table('products')->where('product_id', '=' , $id)->first();
        $getSkuQuery = DB::table('sku')->where('product_id', '=' , $id)->first();
        $getColorQuery = DB::table('colors')->get();
        $getSizeQuery = DB::table('sizes')->get();

        return View::make('user.templates.shop-productDetails', compact([
                                                                        'getProductQuery',
                                                                        'getSkuQuery',
                                                                        'getColorQuery',
                                                                        'getSizeQuery'
                                                                        ]));
    }
    public function getProducSubCategoriesByCategoryId($category_id)
    {
        return SubCategories::where('category_id', $category_id)->get();
    }
   public function paginateProducts()
    {
        $result = DB::table('products')
            ->leftJoin('categories', 'products.product_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.product_id', '=', 'sub_categories.sub_category_id')
            ->leftJoin('sku', 'sku.product_id', '=', 'products.product_id')
            ->leftJoin('colors', 'colors.color_id', '=', 'sku.color_id')
            ->leftJoin('sizes', 'sizes.size_id', '=', 'sku.size_id')
            ->select('products.*', 'categories.category_name', 'sub_categories.sub_category_name', 'sku.*', 'colors.*', 'sizes.*')
            ->orderBy('products.product_id', 'desc')
            ->paginate(4);
        // print_r($result);
        $sortByCategoryResult = DB::table('categories')
            ->orderBy('categories.category_id', 'asc')
            ->get();
        $sortBySubCategoryResult = DB::table('sub_categories')
            ->orderBy('sub_categories.sub_category_id', 'asc')
            ->get();
        return view('user.templates.product', compact([
                    'result',
                    'sortByCategoryResult',
                    'sortBySubCategoryResult'
                ]));
    }
}