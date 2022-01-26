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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


	public function showRegistrationForm() {
        // $data = array_merge(self :: getDefaultData(), ['bscs' => Bsc :: all() -> sortBy('system_word')]);

		// return view('modules.bsc.admin_panel.start_point', $data);

        // dd(5555);

        $page = Page :: where('slug', 'registration') -> first();
        $language = Language :: where('title', 'ge') -> first();

        Page :: setLang($language -> title);

		return view('auth.m-register', PageController :: getDefaultData($language, $page));


		$page = Page :: where('id', 5) -> first();
		$language = Language :: where('like_default', 1) -> first();

		if($language && $page) {
			$page_template = 'static';
			
			$active_module = Module :: where('page', $page -> id) -> first();
			
			if($active_module) {
				$page_template = $active_module -> alias;
			}

			// return view($page_template, ['page' => $page -> getFullData($language -> title),
			// 								'menuButtons' => MenuButton :: getFullData($language -> title),
			// 								'languages' => Language :: getFullData($language -> title, $page),
			// 								'bsc' => Bsc :: getFullData(),
			// 								'bsw' => Bsw :: getFullData($language -> title)]);
		} else {
			abort(404);
		}
	}
}
