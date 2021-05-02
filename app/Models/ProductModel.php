<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table='product';
    
    public $timestamps = true;

    protected $fillable = ['product_name', 'product_description', 'product_status','product_price', 'product_discount','status','product_image',
	];
	
	public function categorys()
	{
		return $this->belongsTo('App\Models\Category','category_id','id');
	}
}
