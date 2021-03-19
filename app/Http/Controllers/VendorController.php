<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegModel;
use App\Models\VendorModel;

class VendorController extends Controller
{
    public function regProcess()
    {
        return view('registration');
    }

    public function vendorRegistration(Request $request)
    {
        // dd(storage_path());
        //dd($request->vcontact_no);
    	//for the entry in users table..
    	
        $users = new RegModel;
        //dd($request->file('image'));
        $users->first_name=$request->vfirst_name;
        $users->last_name=$request->vlast_name;
        $users->email=$request->vemail;
        $users->contact_no=$request->vcontact_no;
        $users->password= bcrypt($request->vpassword);
        //$users->save();

    	$vendor = new VendorModel;
        $vendor->brand_name=$request->brand_name;
        $vendor->establish_year=$request->establish_year;
        $vendor->product_category=$request->product_category;
        $vendor->website_link=$request->website_link;

        $vendor->image = '';
        $attachements = "";
        if($request->image) {
        $attachements = $request->image;

            foreach ($attachements as $attachement) {
                $field = pathinfo($attachement->getClientOriginalName(), PATHINFO_FILENAME);
                $filename = $field . '_' . time() . '.' . $attachement->getClientOriginalExtension();
                $filePath = storage_path() . '\app\public\uploads\vendor';
                //dd($filePath);
                $attachement->move($filePath, $filename);
                $images[] = $filename;
            }
           //print_r($images);exit;  
        }
        if (isset($photos)) {
            $vendor['image'] =  implode(',', $photos); //implode is convert into string
        } else {
            $vendor['image'] =  '';
        }

        $vendor->image = implode(',', $images);
        $vendor->registration_proof = $request->registration_proof;
        $vendor->save();

        return view('registration')->with('vendor',$vendor);
    }
}
