<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class studentMiddleware
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
        
        if(Session::get('student_name')){
            return $next($request);
        }
        else{
            return redirect('/student/login');
        }
    }
}
