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


class UserPermissionMiddleware
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
        $userPermissionArrData = (session()->has('user_permissions_arr') ? session()->get('user_permissions_arr') : []);
        $currentRouteName = Route::currentRouteName();
        if(in_array($currentRouteName,$userPermissionArrData)){
            
            if($request->ajax()){
                $response = array();
                $response["status"] = "error";
                $response["msg"] = trans("messages.You_are_not_authorized_to_access_this_page");
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }else{
                return Redirect()->route(routeNamePrefix() . 'user.dashboard')->with('error', trans('messages.You_are_not_authorized_to_access_this_page'));
            }
        }
        return $next($request);
    }
}
