<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
class LocalizationController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;

    }
    public function setLocale($locale)
    {
        if (Auth::check()) {
            // If the user is logged in, update the preferred_locale field
            Auth::user()->update(['preferred_locale' => $locale]);
        }
        // Set the locale in the session  
        Session::put('locale', $locale);

        // Set the locale for the current request
        app()->setLocale($locale);
        return redirect()->back();
    }
}
