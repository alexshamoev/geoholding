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
            'email' => 'Bad email!'
        ]);
    }


    public function getStartPoint() {
        $defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['admins' => User :: all() -> sortBy('email')]);

		return view('modules.admins.admin_panel.start_point', $data);
    }


    public function add() {
        // $bsc = new Bsc();

		// $bsc -> system_word = '';
		// $bsc -> configuration = '';

		// $bsc -> save();

		// return redirect() -> route('bscEdit', $bsc -> id);


        $user = new User();

        $user -> name = '';
        $user -> password = '';
        $user -> email = '';

        $user -> save();


        // return redirect(route('admin.login')) -> withErrors([
        //     'formError' => 'მოხდა ავტორიზაციის შეცდომა'
        // ]);

        return redirect(route('adminEdit', $user -> id));


        // return view('modules.admins.admin_panel.add', ADefaultData :: get());
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


    /*public function update(Request $request, $id) {
        // if(Auth :: check()) {
        //     return redirect('/admin');
        // }

        $validateFields = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User :: create($validateFields);

        // if($user) {
        //     Auth :: login($user);

        //     return redirect(route('adminStartPoint'));
        // }

        // return redirect(route('admin.login')) -> withErrors([
        //     'formError' => 'მოხდა ავტორიზაციის შეცდომა'
        // ]);
    }*/


    public function update(Request $request, $id) {
        $validateFields = $request -> validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);


		$admin = User :: find($id);

		$admin -> name = (!is_null($request -> input('name')) ? $request -> input('name') : '');
		$admin -> email = (!is_null($request -> input('email')) ? $request -> input('email') : '');
		$admin -> password = (!is_null($request -> input('password')) ? $request -> input('password') : '');

		$admin -> save();

        Mail :: to($admin -> email) -> send(new WelcomeMail());

		return redirect(route('adminEdit', $admin -> id));

        return $admin -> password;
	}


    public function delete($id) {
        User :: destroy($id);

        return redirect() -> route('adminStartPoint');
    }
}
