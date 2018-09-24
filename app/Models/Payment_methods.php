<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_methods extends Model
{
    protected $table='payment_methods';

    public $timestamps= false;

    protected $fillable =[
    	'payment_name',
    	'payment_desc'

    ]
}
