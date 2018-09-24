<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_categories extends Model
{
    protected $table= 'user_categories';

    public $timestamp= false;

    protected $fillable=[
    	'user_category_name',
    	'user_category_desc'
    ];
}
