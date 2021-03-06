<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class check3
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
        if(Auth::check() && Auth::user()->isRole()=='clerk') 
        {
           return $next($request);           
        }
        abort (403, 'YOU ARE NOT AUTHORIZED TO ACCESS THIS PAGE');

    }
}
