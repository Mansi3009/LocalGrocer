<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\RegModel;


class UserController extends Controller
{
    public function index()
    {
    	return view('user');
    }
    public function viewuser()
    {
    	$user = RegModel::paginate(10);
        return view('user',['user'=>$user]);
    }
    public function deleteuser($id)
    {
    	RegModel::where('id',$id)->delete();
    	return redirect('user');
    }
    public function showUser($id)
    {
    	$user = RegModel::where('id',$id)->first();
    	return view('edituser',['user'=>$user]);
    }
    public function updateUser(Request $req)
    {
    	$user = RegModel::find($req->userid);
     	//dd($req->id);   
        $user->first_name=$req->first_name;
        $user->last_name=$req->last_name;
        $user->email=$req->email;
        $user->contact_no=$req->contact_no;

        $user->save();
        return redirect()->route('user');

    }
}
