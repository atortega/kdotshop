<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customer';

    protected $primaryKey = 'customer_id';
	
	public $timestamps = false;
	
	protected $fillable = [
		'first_name',
		'last_name',
		'middle_name'
		'birthdate',
		'gender',
		'address',
		'phone_number',
		'email',
		'password'
	];
}
