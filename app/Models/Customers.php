<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customer';

    protected $primaryKey = 'customer_id';
	
	public $timestamps = false;
	
	protected $fillable = [
		'name',
		'address',
		'phone_number',
		'email',
		'password'
	];
}
