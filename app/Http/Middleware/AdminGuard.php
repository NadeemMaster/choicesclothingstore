<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminGuard
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
        if (!session()->has('admin') && ($request->path() != 'admin/login')) {
            return redirect('/')->with('fail', 'Please login as admin to continue');
        }

        if (session()->has('admin') && ($request->path() == 'admin/login')) {
            return redirect('admin/dashboard')->with('fail', 'Already logged in!');
        }

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Progma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
