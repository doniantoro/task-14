<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Redirect;

class SuperAdmin
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
            return $next($request);
        }
        
        // return Redirect::back();

        return abort(503, 'Anda tidak memiliki hak akses');
 
    }
}
