<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null )
    {
        if(Auth::guard($guard)->check()) {
            if(Auth::users()->roles == 'admin')
            {
                return redirect('/admin');
            }
            elseif(Auth::users()->roles == 'user')
            {
                return redirect('/user');
            }
            if(Auth::users()->roles == 'vendor')
            {
                return redirect('/vendor');
            }
        }
        return $next($request);
    }
}