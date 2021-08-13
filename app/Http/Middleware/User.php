<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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

        $user=auth::user();
        if(auth::check() && $user->role == 'admin'){
            return redirect()->route('home');
          }
          else {
              if (auth::check()) {
                return $next($request);
              }
            return redirect()->route('login');
         }
    }
}
