<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegModel extends Model
{
    //use HasFactory;
    protected $table ='users';
    
    //created_at updated_at nathi aena mate
    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name','email', 'contact_no','password', 'roles','is_active',
	];
}
