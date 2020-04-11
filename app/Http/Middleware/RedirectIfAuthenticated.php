<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
//use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Route;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if ($guard == "admin" && Auth::guard($guard)->check()) {
          
        //     //return Redirect::action('LoginController@index');
        //     //return redirect()->action('Auth\LoginController@index');

        //       return redirect('/admin');
        // }

        if ($guard == "doctor" && Auth::guard($guard)->check()) {
            return redirect('/doctor');
        }
        
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
