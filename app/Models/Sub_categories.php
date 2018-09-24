<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    protected $table= 'sub_categories';

    public $timestamp= false;

    protected $fillable=[
    	'category_id',
    	'sub_category_name',
    	'sub_category_desc'
    ];
}
