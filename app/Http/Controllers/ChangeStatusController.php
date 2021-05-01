<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegModel;
use App\Models\VendorModel;

class ChangeStatusController extends Controller
{
    public function changestatus($user_id) 
    {
    	   	$vendor = VendorModel::with('users')->where('user_id',$user_id)->first();
            //$vendor = RegModel::find($user_id);
            //dd($vendor);
            if($vendor->status == 'approved') 
            {
                $vendor->status = 'new';
            } 
            else 
            {
            	$vendor->status = 'approved';
            }
            if($vendor->save()) 
            {
                //echo json_encode('approved');
                return redirect('view-vendors');
            } 
            else 
            {
                echo json_encode('failed');
            }
    }
}	
