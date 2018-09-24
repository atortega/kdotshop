<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Sku;
class MainController extends Controller
{
    public function index()
    {
        //get latest products
        $latest_products = DB::table('products')
            ->leftJoin('categories', 'products.product_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.product_id', '=', 'sub_categories.sub_category_id')
            ->leftJoin('sku', 'sku.product_id', '=', 'products.product_id')
            ->leftJoin('colors', 'colors.color_id', '=', 'sku.color_id')
            ->leftJoin('sizes', 'sizes.size_id', '=', 'sku.size_id')
            ->select('products.*', 'categories.category_name', 'sub_categories.sub_category_name', 'sku.*', 'colors.*', 'sizes.*')
            ->orderBy('products.product_id', 'desc')
            ->take(8)
            ->get();



        //get all categories
        $categories = Categories::orderBy('category_name', 'asc')->get();

        //get all top sellers
        //$top_sellers = Products::orderByRaw("RAND()")->take(8)->get();
        $top_sellers = DB::table('products')
            ->leftJoin('categories', 'products.product_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.product_id', '=', 'sub_categories.sub_category_id')
            ->leftJoin('sku', 'sku.product_id', '=', 'products.product_id')
            ->leftJoin('colors', 'colors.color_id', '=', 'sku.color_id')
            ->leftJoin('sizes', 'sizes.size_id', '=', 'sku.size_id')
            ->select('products.*', 'categories.category_name', 'sub_categories.sub_category_name', 'sku.*', 'colors.*', 'sizes.*')
            ->orderByRaw('RAND()')
            ->take(8)
            ->get();

        $data = [
            'latest_products' => $latest_products,
            'categories' => $categories,
            'top_sellers' => $top_sellers
        ];

        return view('user.html.templates.index', $data);
    }


}
