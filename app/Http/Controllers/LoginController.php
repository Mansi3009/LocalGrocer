<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }   
    protected function saveLogin(Request $request) 
	{
    	$credentials = [
    		'email' => $request->email,
    		'password' => $request->password,
    	];
        if (Auth::attempt($credentials)) 
        {
            // Authentication passed...
            // redirect()->intended('dashboard');
            dd('true');
        }  
        else 
        {
        	dd('false');
        }
	}
}
