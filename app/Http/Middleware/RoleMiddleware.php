<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // print_r('role');die;
        if (auth()->check()) {
            $rolePrefix = (auth()->user()->role->name === 'superadmin') ? 'admin' : 'agent';
            $request->attributes->add(['rolePrefix' => $rolePrefix]);
        }
        return $next($request);
        // if(!empty(auth()->guest())){
		// 	return Redirect()->to('/');
		// }
        
        // if (empty($roles) || in_array(auth()->user()->role->name, $roles)) {
        //     return $next($request);
        // }
        // abort(403, 'Unauthorized');
    }
}
