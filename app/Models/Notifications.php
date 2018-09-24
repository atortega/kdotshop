<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table='notifications';
    public $timestamp='false';
    protected $fillable=[
    	'order_id',
    	'body_of_message'

    ];
}
