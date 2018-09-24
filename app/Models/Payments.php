<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
     protected $table = 'payments';
	
	public $timestamps = false;
	
	protected $fillable = [
		'payment_method_id',
		'order_id',
		'invoice_number',
		'amount',
		'date_paid',
		'reference_code'
		
	];
}
