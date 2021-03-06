<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App\Applicant;
class admin
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
        if(Auth::check() && Auth::user()->isRole()=='admin') 
        {
           return $next($request);           
        }
        abort (403, 'YOU ARE NOT AUTHORIZED TO ACCESS THIS PAGE');
    }
}
