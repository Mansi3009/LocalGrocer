<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        $users->password=bcrypt($request->vpassword);
        $users->roles = 'vendor';
        $users->save();
        //dd($users);

    	$vendor = new VendorModel;
        $vendor->user_id=$users->id;
        $vendor->brand_name=$request->brand_name;
        $vendor->establish_year=$request->establish_year;
        $vendor->product_category=$request->product_category;
        $vendor->website_link=$request->website_link;

        $vendor->image = '';
        $attachements = "";
        
        if($request->image) {
        $attachements = $request->image;
        foreach ($attachements as $attachement) 
            {
                $field = pathinfo($attachement->getClientOriginalName(), PATHINFO_FILENAME);
                $filename = $field . '_' . time() . '.' . $attachement->getClientOriginalExtension();
                $filePath = storage_path() . '\app\public\uploads\vendor';
                //dd($filePath);
                $attachement->move($filePath, $filename);
                $images[] = $filename;
            }  
        }
        if (isset($photos)) 
        {
            $vendor['image'] = implode(',', $photos);
        } 
        else 
        {
            $vendor['image'] =  '';
        }

        $vendor->image = implode(',', $images);
    
        $vendor->registration_proof = $request->registration_proof;
        $vendor->save();

        return view('registration')->with('vendor',$vendor);
    }

    //for display data from 2 tables..
    public function index()
    {

        $users = VendorModel::paginate(10);
        //relationship and joins..
        $user = RegModel::with('vendors')->where('roles','vendor')->get();
        //$users = VendorModel::with('users')->get();
        //dd($user);
        return view('vendor',['user'=>$user]);
    }

    public function viewvendor($id)
    {
        //return RegModel::find($id);
        $users = VendorModel::with('users')->where('user_id',$id)->first();
        //dd($users);
        return view('viewvendor',compact('users'));
    }

    public function delete($id)
    {
        VendorModel::where('user_id',$id)->delete();
        RegModel::where('id',$id)->delete();
        return redirect('view-vendors');
    }

    public function showData($id)
    {
        $users = VendorModel::with('users')->where('user_id',$id)->first();   
        return view('editvendor',compact('users'));
    }

    public function update(Request $req)
    {
        //return $req->input();
        $vendors=VendorModel::find($req->id);
        $users=RegModel::find($req->userid);
        $users->first_name=$req->vfirst_name;  
        $users->last_name=$req->vlast_name;
        $users->email=$req->vemail;
        $users->contact_no=$req->vcontact_no;
        $users->password=$req->vpassword;
        $users->save();

        $vendors->brand_name=$req->brand_name;
        $vendors->establish_year=$req->establish_year;
        $vendors->product_category=$req->product_category;
        $vendors->website_link=$req->website_link;
        $vendors->image=$req->image;
        $vendors->registration_proof=$req->registration_proof;
        $vendors->save();

        return redirect('view-vendors');
    }    
}
