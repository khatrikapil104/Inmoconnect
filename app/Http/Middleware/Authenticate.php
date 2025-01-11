<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

     
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
    public function handle($request, Closure $next, ...$guards)
     {
         // This method checks if the user is authenticated with any of the specified guards.
         // If not authenticated, it throws an "Unauthenticated" exception.
         if ($this->auth->guard('api')->guest()) {
             // If it's an API request and the user is not authenticated, return a 401 error.
             return response()->json(['status' => 'error','msg' => 'You are not autnenticated to access this api'], 401);
         }
 
         return $next($request);
     }

   
}
