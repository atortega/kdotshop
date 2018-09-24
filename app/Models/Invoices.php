<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';

    public $timestamp= false;

    protected $fillable=[
    	'invoice_number',
    	'payment-id',
    	'date'
    ];
}
