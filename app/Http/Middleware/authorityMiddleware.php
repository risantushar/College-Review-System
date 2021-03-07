<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;

class authorityMiddleware
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
        if(Session::get('authority_name')){
            return $next($request);
        }
        else{
            return redirect('/authority/login');
        }
    }
}
