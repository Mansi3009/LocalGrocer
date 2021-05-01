<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use HasFactory;
	protected $table='category';
    
    public $timestamps = true;

    protected $fillable = ['c_name', 'c_image',
	];

	public function products()
	{
		return $this->hasMany('App\Models\ProductModel','category_id','id');
	}
}
