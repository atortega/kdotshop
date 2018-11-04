<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';

    public $timestamps = false;

    protected $primaryKey = 'invoice_number';

    protected $fillable=[
    	'invoice_number',
    	'payment-id',
    	'date'
    ];
}
