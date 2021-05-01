<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }   
    public function saveLogin(Request $request) 
	{
    	$credentials = [
    		'email' => $request->email,
    		'password' => $request->password,
    	];
        if (Auth::attempt($credentials)) 
        {
            //dd(Auth::user());
            if(Auth::user()->roles == 'admin')
            {
                return redirect()->route('admin');
            }
            elseif(Auth::user()->roles == 'customer')
            {
                 return redirect()->route('categorydisplay');
            }
            elseif(Auth::user()->roles == 'vendor')
            {
                return redirect()->route('vendor');
            }
        }  
        else 
        {
                return redirect()->route('login');
        	//dd('false');
        }
    }
}