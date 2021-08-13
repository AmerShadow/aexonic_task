<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        $user=auth::user();
        if(auth::check() && $user->role == 'admin'){
            return $next($request);
        }
        else {
            if (auth::check()) {
                return redirect()->route('user_home');

            }
          return redirect()->route('login');
       }
    }
}
