<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegModel;
//use App\RegModel;

class RegistrationController extends Controller
{
    public function regProcess()
    {
        return view('registration');
    }
    public function registration(Request $request)
    {

        $users = new RegModel;

        $users->first_name=$request->first_name;
        $users->last_name=$request->last_name;
        $users->email=$request->email;
        $users->contact_no=$request->contact_no;
        $users->password=bcrypt($request->password);

        $users->save();
    }
    public function delete($id)
    {
        $users = RegModel::where('id',$id);
        //$users = RegModel::where('id',$id);
        //dd($users);
        $users->delete();
        return redirect('view-vendors');
    }
    public function showData($id)
    {
        $users = RegModel::find($id);
        return view('/editvendor',['users'=>$users]);
    }  

}