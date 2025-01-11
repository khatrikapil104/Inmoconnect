<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToWww
{
    public function handle($request, Closure $next)
    {
        $appMode = env('APP_MODE');
        if($appMode != 'local'){
            // if (strpos($request->header('host'), 'www.') === false && strpos($request->header('host'), 'staging.') === false && strpos($request->header('host'), 'prod.') === false) {
            if (strpos($request->header('host'), 'www.') === false ) {
                
                $newUrl = 'https://www.' . $request->getHost() . $request->getRequestUri();
                return redirect($newUrl, 301);
            }
        }

        return $next($request); 
    }
}
