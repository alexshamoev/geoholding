<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Page;
use App\MenuButton;
use App\Models\Language;
use App\Module;
use App\Bsc;
use App\Bsw;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    public function showLoginForm()
    {
        $page = Page :: where('slug', 'registration') -> first();
        $language = Language :: where('title', 'ge') -> first();

        Page :: setLang($language -> title);

		// return view('auth.m-register');

        return view('auth.login', PageController :: getDefaultData($language, $page));
    }
}
