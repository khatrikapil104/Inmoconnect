<?php

namespace App\Http\Middleware;

use Closure;
Use Auth;
Use Redirect;
Use Session;
Use Response;
Use App;
Use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class GuestMiddleware 
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */ 
    public function handle($request, Closure $next) {
        if(!empty(Auth::user()) && Route::currentRouteName() !== 'user.setLocale'){
            return Redirect()->route(routeNamePrefix().'user.dashboard');
        }

        return $next($request);
    }

}
