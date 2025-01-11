<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\SocialUser;
use DB, Redirect,Response,Hash,Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;

    }

    public function redirectToGoogle(Request $request)
    {
        session()->put('logInType',$request->type ?? '');
        return Socialite::driver('google')->redirect();
    }

    public function redirectToTwitter(Request $request)
    {
        session()->put('logInType',$request->type ?? '');
        return Socialite::driver('twitter')->redirect();
    }

    public function handleGoogleCallback()
    {
        $type = !empty(session()->get('logInType')) ? session()->get('logInType') : 'customer';
        $user = Socialite::driver('google')->user();

        // Check if the user exists in the social_users table
        $socialUser = SocialUser::where('provider', 'google')
            ->where('provider_user_id', $user->id)
            ->first();

        if ($socialUser) {
            // Log in the existing user
            auth()->loginUsingId($socialUser->user_id);
        } else {
            $userRoleId = Role::where('name',$type)->value('id');
            $checkIfUserExists = User::where('email',$user->email)->first();
            if(empty($checkIfUserExists)){
                $checkIfUserExists = User::create([
                    'name' => $user->name,
                    'user_role_id' => $userRoleId,
                    'email' => $user->email,
                    'email_verified_at' => now(),
                    'current_status'=>  User::FIRST_STEP
                ]);
            }
            $newSocialUser = new SocialUser([
                'provider' => 'google',
                'provider_user_id' => $user->id,
                'provider_access_token' => $user->token,
                'provider_refresh_token' => $user->refreshToken,
            ]);

            $checkIfUserExists->socialUsers()->save($newSocialUser);

            Auth::loginUsingId($checkIfUserExists->id);
        }

        if (auth()->user()->is_active == 0) {
            auth()->logout();
            Session()->flash('error', trans("messages.Your_account_is_deactivated_Please_contact_to_the_admin"));
            return redirect()->route(routeNamePrefix().'user.login');
        } 
        if (empty(auth()->user()->email_verified_at) ) {
            auth()->logout();
            Session()->flash('error', trans("messages.Your_account_is_not_verified"));
            return redirect()->route(routeNamePrefix().'user.login');
        }  
        session()->forget('logInType');
        Session()->flash('flash_notice', trans("messages.logged_in_message"));
        return redirect()->route(routeNamePrefix().'user.dashboard');
    }

    public function handleTwitterCallback()
    {
        $type = !empty(session()->get('logInType')) ? session()->get('logInType') : 'customer';
        $twitterUser = Socialite::driver('twitter')->user();

        $socialUser = SocialUser::where('provider', 'twitter')
            ->where('provider_user_id', $twitterUser->id)
            ->first();

        if ($socialUser) {
            Auth::loginUsingId($socialUser->user_id);
        } else {
            $userRoleId = Role::where('name',$type)->value('id');
            $checkIfUserExists = User::where('email',$twitterUser->email)->first();
            if(empty($checkIfUserExists)){
                $checkIfUserExists = User::create([
                    'name' => $twitterUser->name,
                    'user_role_id' => $userRoleId,
                    'email' => $twitterUser->email,
                    'email_verified_at' => now(),
                    'current_status'=>  User::FIRST_STEP
                   
                ]);
            }

            $newSocialUser = new SocialUser([
                'provider' => 'twitter',
                'provider_user_id' => $twitterUser->id,
                'provider_access_token' => $twitterUser->token,
                'provider_refresh_token' => $twitterUser->refreshToken,
            ]);

            $checkIfUserExists->socialUsers()->save($newSocialUser);
            Auth::loginUsingId($checkIfUserExists->id);
        }
        if (auth()->user()->is_active == 0) {
            auth()->logout();
            Session()->flash('error', trans("messages.Your_account_is_deactivated_Please_contact_to_the_admin"));
            return redirect()->route(routeNamePrefix().'user.login');
        } 
        if (empty(auth()->user()->email_verified_at) ) {
            auth()->logout();
            Session()->flash('error', trans("messages.Your_account_is_not_verified"));
            return redirect()->route(routeNamePrefix().'user.login');
        } 
        session()->forget('logInType'); 
        Session()->flash('flash_notice', trans("messages.logged_in_message"));
        return redirect()->route(routeNamePrefix().'user.dashboard');
    }
}


