<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery_addresses extends Model
{
    protected $table='delivery_addresses';

    public $timestamp= false;

    protected $fillable=[
    	'customer_id',
        'billing_first_name',
        'billing_last_name',
        'billing_contact_number',
        'billing_email',
        'billing_address',
        'billing_country',
        'billing_city',
        'billing_zip_code',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_contact_number',
        'shipping_email',
        'shipping_address',
        'shipping_country',
        'shipping_city',
        'shipping_zip_code'

    ];
}
