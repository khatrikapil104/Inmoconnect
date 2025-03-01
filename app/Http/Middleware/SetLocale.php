<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(!$request->session()->has('default_locale')){
            app()->setLocale(env('DEFAULT_LOCALE'));
            session()->put('default_locale',env('DEFAULT_LOCALE'));
            session()->put('locale',env('DEFAULT_LOCALE'));
        }else if ($request->session()->has('locale')) {
            app()->setLocale($request->session()->get('locale'));
        }
        return $next($request);
    }
}
