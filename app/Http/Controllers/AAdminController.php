<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AAdminUpdateRequest;
use Session;


class AAdminController extends AController {
    public function logout() {
        if(Auth::check()) {
            Auth::logout();
        }

        return redirect(route('adminLogin'));
    }


    public function getLogin() {
        if(Auth::check()) {
            if(Auth::user()->admin) {
                return redirect()->intended(route('adminDefaultPage'));
            }
        }
        
        return view('admin.login');
    }


    public function login(Request $request) {
        if(Auth::check()) {
            if(Auth::user()->admin) {
                return redirect()->intended(route('adminDefaultPage'));
            }
        }

        $formFields = $request->only(['email', 'password']);

        if(Auth::attempt($formFields)) {
            if(Auth::user()->admin) {
                return redirect()->intended(route('adminDefaultPage'));
            }
        }

        return redirect(route('adminLogin'))->withErrors(['email' => 'Bad data!'])->withInput();
    }


    public function getStartPoint() {
        $activeUser = Auth::user();

        if($activeUser->super_administrator) {
            $data = array_merge(self::getDefaultData(), ['module' => Module::where('alias', 'admins')->first(),
                                                            'admins' => User::all()->where('admin', '1')->sortBy('email')]);
        } else {
            $data = array_merge(self::getDefaultData(), ['module' => Module::where('alias', 'admins')->first(),
                                                            'admins' => User::all()->where('admin', '1')->where('super_administrator', '0')->sortBy('email')]);
        }

		return view('modules.admins.admin_panel.start_point', $data);
    }
    
    
    public function add() {
        $data = array_merge(self::getDefaultData(), ['module' => Module::firstWhere('alias', 'admins')]);

		return view('modules.admins.admin_panel.add', $data);
    }


    public function insert(AAdminUpdateRequest $request) {
        $admin = new User();

		$admin->name = $request->input('name');
		$admin->email = $request->input('email');
		$admin->password = $request->input('password');
		$admin->admin = 1;

		$admin->save();


        // Mail::to($admin->email)->send(new WelcomeMail($admin->email, $request->input('password')));


		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect(route('adminEdit', $admin->id));
	}


    public function edit($id) {
		$admin = User::find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(User::all()->sortBy('email') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data->id;
			}
			
			if($admin->id === $data->id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data->id;
			}
		}

		$data = array_merge(self::getDefaultData(), ['module' => Module::where('alias', 'admins')->first(),
                                                        'admins' => User::all()->sortBy('email'),
                                                        'activeAdmin' => User::find($id),
                                                        'prevAdminId' => $prevId,
                                                        'nextAdminId' => $nextId]);

		return view('modules.admins.admin_panel.edit', $data);
	}


    public function update(AAdminUpdateRequest $request, $id) {
        $admin = User::find($id);

		$admin->name = $request->input('name');
		$admin->email = $request->input('email');
		$admin->password = $request->input('password');
		$admin->admin = 1;

		$admin->save();


        // Mail::to($admin->email)->send(new WelcomeMail($admin->email, $request->input('password')));


		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect(route('adminEdit', $admin->id));
	}


    public function delete($id) {
        User::destroy($id);

		Session::flash('successStatus', __('bsw.deleteSuccessStatus'));

        return redirect()->route('adminStartPoint');
    }
}
