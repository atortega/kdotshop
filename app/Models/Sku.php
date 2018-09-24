<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $table='sku';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable=[
        'sku',
    	'product_id',
    	'color_id',
    	'size_id',
    	'number_of_items',
    	'unit of price'
    ];
}
