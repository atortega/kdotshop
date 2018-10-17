<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomersAddress extends Model
{
    protected $table = 'customers_address';

    protected $primaryKey = 'customers_address_id';

    public $timestamp= false;
}