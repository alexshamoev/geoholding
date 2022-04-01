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
use App\Http\Controllers\FrontController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;

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

    // public function login(Request $request) {
    //     // dd($request -> input('password'));

    //     // Auth::login($user);
    //     // dd($user);
    //     // // return redirect(route('adminLogin')) -> withErrors(['email' => 'Bad data!']) -> withInput();
    //     // dd('oh no!');
    // }

    // public function login(Request $request) {
    //     // dd(22);

    //     // $formFields = $request -> only(['email', 'password']);
    //     // dd($formFields);
    //     // $testy = Auth :: attempt($formFields);

    //     // $password = Hash::make($request -> input('password'));
    //     // dd(password_verify($request -> input('password'), '$2y$10$uIrokOcf/.o0XH6pmYtDzejNHWxlUD.9P9f5k39M2L9gUUyDQaVV2'));

    //     // $formFields['password'] = $password;
    //     // dd($formFields);

    //     if(Auth :: attempt($formFields)) {
    //         dd('yes');
    //             // return redirect() -> intended(route('adminDefaultPage'));
    //     }

    //     // dd('no');
    //  }

    
    public function showLoginForm()
    {
        $page = Page :: where('slug', 'registration') -> first();
        $language = Language :: where('title', 'ge') -> first();

		// return view('auth.m-register');

        return view('auth.login', FrontController :: getDefaultData($language, $page));
    }

    public function logout()
    {
        $page = Page :: where('slug', 'registration') -> first();
        $language = Language :: where('title', 'ge') -> first();

		Auth :: logout();

        return view('auth.login', FrontController :: getDefaultData($language, $page));
    }

    
}
