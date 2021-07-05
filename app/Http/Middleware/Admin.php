<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redirect;
use Closure;

class Admin
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
            // if(auth()->user()->role == 2)
            return $next($request);
            
        }
        return Redirect::back();

        // return abort(503, 'Anda tidak memiliki hak akses');
 
    }
}
