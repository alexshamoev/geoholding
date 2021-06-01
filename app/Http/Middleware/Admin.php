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
		if(\Auth :: check() && \Auth :: user() -> isAdmin() == true) {
			echo 'Admin Auth Middleware';
      echo \Auth :: check();

		} else {
			echo 'Unauthorization';
		}

		return $next($request);
		
		// return redirect('/');
    }
}
