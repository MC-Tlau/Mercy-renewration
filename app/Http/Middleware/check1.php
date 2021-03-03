<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class check1
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
        if(Auth::check() && Auth::user()->isRole()==1) 
        {
           return $next($request);           
        }
        return response ('YOU ARE NOT AUTHORIZED TO ACCESS THIS PAGE!!');
    }
}
