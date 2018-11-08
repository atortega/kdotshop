<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Categories;

class SubCategories extends Model
{
    protected $table= 'sub_categories';

    protected $primaryKey = 'sub_category_id';

    public $timestamps = false;

    protected $fillable=[
    	'category_name',
    	'sub_category_name',
    	'sub_category_desc'
    ];

    public function getSubCategories()
    {
        
    }
}
