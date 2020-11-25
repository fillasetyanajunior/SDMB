<?php

namespace App\Http\Middleware;

use Closure;

class User
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
        if(request()->user()->hasRole('user'))
        {
            return $next($request);
        }elseif(request()->user()->hasRole('admin'))
        {
            return redirect('/admin');
        }
        else{

            return redirect('/home');
        }
    }
}
