<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        

        // if(Auth::users()->roles == 'vendor')
        // {
        //     return redirect()->route('vendor.index');
        // }

        // if(Auth::users()->roles == 'admin')
        // {
        //     return redirect()->route('admin.index');
        // }

        // if(Auth::users()->roles == 'user')
        // {
        //     return redirect()->route('user.index');
        // }
        return $next($request);
    }
}
