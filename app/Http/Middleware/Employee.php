<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use Closure;

class Employee
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
        if(auth()->user()){
            // if(auth()->user()->role == 3)
            return $next($request);
            
        }
      
        return Redirect::back();
 
    }
}
