<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table='categories';

    protected $primaryKey = 'category_id';

    public $timestamps = false;

    protected $fillable=[
    	'category_name',
    	'category_desc'
    ];
}
