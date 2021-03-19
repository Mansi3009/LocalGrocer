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
        $users->password=  bcrypt($request->password);

        $users->save();
    }
    /*public function processRegisration()
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required',
            'password' => 'required',
            'roles' => 'customer',
            'is_active' => 'required'
    ]);
    $user = User::create(request(['first_name','last_name','email','contact_no','password','roles','is_active'  		
    	]));
    }*/
}
