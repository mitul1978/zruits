<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuthenticateDistributor
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

        if (!Auth::guard('distributor')->check()) {
            return redirect('/distributor/login');
        }


        return $next($request);
    }
}
