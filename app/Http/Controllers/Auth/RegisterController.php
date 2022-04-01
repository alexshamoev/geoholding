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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User :: create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        // $page = Page :: where('slug', 'registration') -> first();
        // $language = Language :: where('title', 'ge') -> first();

		// // return view('auth.m-register');

        // return view('auth.login', FrontController :: getDefaultData($language, $page));
    }


	public function showRegistrationForm() {
        $page = Page :: where('slug', 'registration') -> first();
        $language = Language :: where('title', 'ge') -> first();

		return view('auth.register', FrontController :: getDefaultData($language, $page));
	}
}
