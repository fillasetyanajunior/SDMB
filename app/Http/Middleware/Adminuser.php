<?php

namespace App\Http\Middleware;

use Closure;

class Adminuser
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
        if (request()->user()->hasRole('admin')) {
            return $next($request);
        }else if (request()->user()->hasRole('user')) {
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}
