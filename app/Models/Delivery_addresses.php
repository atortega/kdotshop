<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery_addresses extends Model
{
    protected $table='delivery_addresses';

    public $timestamp= false;

    protected $fillable=[
    	'customer_id',
    	'first_name',
    	'last_name',
    	'middle_initial',
    	'barangay',
    	'municipality',
    	'city',
    	'province',
    	'zipcode',
    	'country'

    ];
}
