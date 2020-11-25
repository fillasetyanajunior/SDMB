<?php

namespace App\Http\Middleware;

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

        if(request()->user()->hasRole('admin'))
        {
            return $next($request);
        }elseif(request()->user()->hasRole('user'))
        {
            return redirect('/user');
        }else{

            return redirect('/home');
        }
    }
}
