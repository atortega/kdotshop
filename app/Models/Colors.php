<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = 'colors';

    protected $primaryKey = 'color_id';
	
	public $timestamps = false;
	
	protected $fillable = [
		'color',
		'description'
	];
}
