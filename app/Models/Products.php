<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';

    protected $primaryKey = 'product_id';

    public $timestamps= false;

    protected $fillable=[
    	'sub_category_id',
        'category_id',
    	'product_name',
    	'product_desc',
        'product_image',
        'originalfilename',
        'thumb',

    ];

    public function get_products()
    {
        $products = DB::table($this->table)
            ->leftJoin('categories', 'products.product_id', '=', 'categories.category_id')
            ->leftJoin('sub_categories', 'products.product_id', '=', 'sub_categories.sub_category_id')
            ->leftJoin('sku', 'sku.product_id', '=', 'products.prodduct_id')
            ->leftJoin('colors', 'colors.color_id', '=', 'products.color_id')
            ->leftJoin('sizes', 'sizes.size_id', '=', 'pruducts.size_id')
            ->select('products.*', 'categories.category_name', 'sub_categories.sub_category_name', 'sku.*', 'colors.*', 'sizes.*')
            ->get();

        return $products;
    }
}
