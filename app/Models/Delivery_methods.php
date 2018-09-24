<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery_methods extends Model
{
    protected $table= 'delivery_methods';

    public $timestamp= false;

    protected $fillable=[
    	'delivery_method_name',
    	'delivery_method_desc'
    ];
}
