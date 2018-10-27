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
		'quantity',
		'unit_price',
		'total_amount',
	];

	public function get_orders()
	{
		$orders = DB::table($this->table)
			->leftjoin('customer', 'orders.customer_id', '=', 'customer.customer_id')
			->leftjoin('sku', 'orders.sku', '=', 'sku.id')
			->leftjoin('delivery_methods', 'orders.delivery_method_id', '=', 'delivery_methods.delivery_method_id')
			->select('orders.*', 'customer.first_name', 'sku.*', 'delivery_methods.delivery_method_name')
			->get();

		return $orders;
	}
}
