<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Model\Admin;
use App\Models\AclAdminAction;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
Use Redirect;
Use Route,DB;
Use Session,Config;


class ProfileSetupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if(!empty(Auth::guest())){
            return Redirect()->to('/');
		}
        if(Route::currentRouteName() != routeNamePrefix().'user.profileSetup' && Route::currentRouteName() != routeNamePrefix().'user.logout' && Auth::user()->current_status != 'completed' && auth()->user()->role->name != 'superadmin' && auth()->user()->role->name != 'admin'){
            return Redirect()->route(routeNamePrefix().'user.profileSetup');
        }

        return $next($request);
    }
}
