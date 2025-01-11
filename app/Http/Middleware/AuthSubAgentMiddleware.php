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


class AuthSubAgentMiddleware
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
        if(Auth::user()->role->name == 'superadmin' || Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'agent' ||Auth::user()->role->name == 'customer' || Auth::user()->role->name == 'developer'|| Auth::user()->role->name == 'sub-developer'){
            return Redirect()->route(routeNamePrefix().'user.dashboard')->with('error',trans('messages.You_are_not_authorized_to_access_this_page'));
        }
        
        // print_r($request->server->get('REQUEST_URI'));die;
        if (!empty($request->notification_id)) {
            Notification::where('id', $request->notification_id)->update(['is_read' => 1]);
            $queryParameters = $request->query();
            unset($queryParameters['notification_id']);
            if(!empty($queryParameters)){
                $newUrl = url()->current() . '?' . http_build_query($queryParameters);
            }else{
                $newUrl = url()->current();
            }
            return redirect()->to($newUrl);
        }
        return $next($request);
    }
}
