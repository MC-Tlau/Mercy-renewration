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
        if(Auth::check() && Auth::user()->isRole()=='csc') 
        {
           return $next($request);           
        }
        abort (403, 'YOU ARE NOT AUTHORIZED TO ACCESS THIS PAGE');
    }
}
