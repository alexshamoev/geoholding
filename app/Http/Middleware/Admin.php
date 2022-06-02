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
    public function handle($request, Closure $next) {
      	if(!Auth::guard('admin')->check()) {
			return redirect()->route('login_from')->with('error', 'Plz Login First');   
		}

		return $next($request);
    }
}
