<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class adminMiddleware
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
        if(Session::get('admin_name')){
            return $next($request);
        }
        else{
            return redirect('/admin/login');
        }
    }
}
