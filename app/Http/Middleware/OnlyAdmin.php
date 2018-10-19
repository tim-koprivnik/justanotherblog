<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; //!!!!

class OnlyAdmin
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
        // return $next($request);

        // so that only Admin has access to Users (and other things?)
        if(Auth::check()) {
            
            if(Auth::user()->isAdmin()) {
                return $next($request);
            }
        }

        return redirect('/admin');
    }

}
