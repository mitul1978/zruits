<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Str;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {


        if (! $request->expectsJson()) {

            if(Str::contains($request->getRequestUri(), 'user'))
            return route('login.form');


            return route('login');
        }
    }
}
