<?php

namespace App\Http\Middleware;
use App\Http\Middleware\App\funtion;
use Closure;
use Illuminate\Support\Facades\App;

class LoginDatHangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!get_data_user('web')){
            return redirect()->route('dangnhapdathang');
        }
        return $next($request);
    }
}
