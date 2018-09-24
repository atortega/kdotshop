<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'order_id';
	
	public $timestamps = false;
	
	protected $fillable = [
		'customer_id',
		'sku',
		'delivery_method_id',
		'order_date',
		'date_updated',
		'quantity',
		'unit_price',
		'total_amount',
		'status',
		
	];
}
