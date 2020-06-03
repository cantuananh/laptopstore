<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            if (Auth::user()->checkRole(explode('|' , $role))) {
                return $next($request);
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
