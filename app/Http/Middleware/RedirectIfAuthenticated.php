<?php

namespace App\Http\Middleware;

use Closure;


use Auth;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth::guard()->check() && strcmp(auth::user()->role , "admin") == 0)
        {
            return redirect()->route('home');
        }
        elseif(auth::guard()->check() && strcmp(auth::user()->role , "normal_user") == 0)
        {
            return redirect()->route('user_home');
        }
        else
        {
            return $next($request);
        }
    }
}
