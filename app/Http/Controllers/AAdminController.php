<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use App\ADefaultData;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class AAdminController extends Controller {
    public function logout() {
        if(Auth :: check()) {
            Auth :: logout();
        }

        return redirect(route('adminLogin'));
    }


    public function getLogin() {
        if(Auth :: check()) {
            return redirect() -> intended(route('adminDefaultPage'));
        }
        
        return view('admin.login');
    }


    public function login(Request $request) {
        if(Auth :: check()) {
            return redirect() -> intended(route('adminDefaultPage'));
        }


        $formFields = $request -> only(['email', 'password']);

        if(Auth :: attempt($formFields)) {
            return redirect() -> intended(route('adminDefaultPage'));
        }

        return redirect(route('adminLogin')) -> withErrors([
            'email' => 'Bad data!'
        ]) -> withInput();

        // return redirect() -> route('bswEdit', $bsw -> id) -> withErrors($validator) -> withInput();
    }


    public function getStartPoint() {
        $defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['admins' => User :: all() -> sortBy('email')]);

		return view('modules.admins.admin_panel.start_point', $data);
    }


    public function add() {
        $user = new User();

        $user -> name = '';
        $user -> password = '';
        $user -> email = '';

        $user -> save();

        return redirect(route('adminEdit', $user -> id));
    }


    public function edit($id) {
		$admin = User :: find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(User :: all() -> sortBy('email') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($admin -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}

		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['admins' => User :: all() -> sortBy('email'),
											'activeAdmin' => User :: find($id),
											'prevAdminId' => $prevId,
											'nextAdminId' => $nextId]);

		return view('modules.admins.admin_panel.edit', $data);
	}


    public function update(Request $request, $id) {
        $admin = User :: find($id);


        // Validation
			$validator = Validator :: make($request -> all(), array(
                'name' => 'required|max:255',
				'email' => 'required|email|max:255',
				'password' => 'required|max:255',
				'password_confirmation' => 'required|max:255'
            ));

			if($validator -> fails()) {
				return redirect() -> route('adminEdit', $admin -> id) -> withErrors($validator) -> withInput();
			}
		//


		$admin -> name = $request -> input('name');
		$admin -> email = $request -> input('email');
		$admin -> password = $request -> input('password');

		$admin -> save();

        Mail :: to($admin -> email) -> send(new WelcomeMail($admin -> email, $request -> input('password')));

		return redirect(route('adminEdit', $admin -> id));

        return $admin -> password;
	}


    public function delete($id) {
        User :: destroy($id);

        return redirect() -> route('adminStartPoint');
    }
}
