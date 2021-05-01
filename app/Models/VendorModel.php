<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    use HasFactory;
    protected $table ='vendor';
    
    public $timestamps = true;
    
    protected $fillable = ['brand_name', 'establish_year','product_category', 'website_link','store_image', 'registration_proof',
	];

	//joins 
	public function users()
	{
		return $this->belongsTo('App\Models\RegModel','user_id','id');
	}
}
