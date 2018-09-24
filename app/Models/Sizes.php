<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $table = 'sizes';

    protected $primaryKey = 'size_id';
	
	public $timestamps = false;
	
	protected $fillable = [
		'size',
		'description'
	];
}
