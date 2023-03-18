<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!session()->has('customer') && ($request->path() != 'customer/login' && $request->path() != 'customer/signup')) {
            return redirect('customer/login')->with('fail', 'Please login to continue');
        }

        if (session()->has('customer') && ($request->path() == 'customer/login')) {
            return redirect('customer/dashboard')->with('fail', 'You are already logged in !');
        }
        
        if (session()->has('customer') && ($request->path() == 'customer/signup')) {
            return redirect('customer/dashboard')->with('fail', 'Please logout to register a new account.');
        }
        
        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Progma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
