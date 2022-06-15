<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AAdminUpdateRequest;
use Session;


class AAdminController extends AController {
    public function logout() {
        if(Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        return redirect(route('adminLogin'));
    }


    public function getLogin() {
        return view('admin.login');
    }


    public function login(Request $request) {
        $formFields = $request->only(['email', 'password']);

        if(Auth::guard('admin')->attempt($formFields)) {
            return redirect()->intended(route('adminDefaultPage'));
        }

        return redirect(route('adminLogin'))->withErrors(['email' => 'Bad data!'])->withInput();
    }


    public function getStartPoint() {
        $activeAdmin = Auth::guard('admin')->user();

        if($activeAdmin->super_administrator) {
            $data = array_merge(self::getDefaultData(), ['module' => Module::where('alias', 'admins')->first(),
                                                            'admins' => Admin::all()->sortByDesc('id')]);
        } else {
            $data = array_merge(self::getDefaultData(), ['module' => Module::where('alias', 'admins')->first(),
                                                            'admins' => Admin::all()->where('super_administrator', '0')->sortByDesc('id')]);
        }

		return view('modules.admins.admin_panel.start_point', $data);
    }
    
    
    public function add() {
        $data = array_merge(self::getDefaultData(), ['module' => Module::firstWhere('alias', 'admins')]);

		return view('modules.admins.admin_panel.add', $data);
    }


    public function insert(AAdminUpdateRequest $request) {
        $admin = new Admin();

		$admin->name = $request->input('name');
		$admin->email = $request->input('email');
		$admin->password = $request->input('password');
		$admin->save();

		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect(route('adminEdit', $admin->id));
	}


    public function edit($id) {
		$admin = Admin::find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(Admin::all()->sortByDesc('id') as $data) {
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

		$data = array_merge(self::getDefaultData(), ['module' => Module::firstWhere('alias', 'admins'),
                                                        'admins' => Admin::all()->sortByDesc('id'),
                                                        'activeAdmin' => Admin::find($id),
                                                        'prevAdminId' => $prevId,
                                                        'nextAdminId' => $nextId]);

		return view('modules.admins.admin_panel.edit', $data);
	}


    public function update(AAdminUpdateRequest $request, $id) {
        $admin = Admin::find($id);

		$admin->name = $request->input('name');
		$admin->email = $request->input('email');
		$admin->password = $request->input('password');
		$admin->admin = 1;
		$admin->save();

		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect(route('adminEdit', $admin->id));
	}


    public function delete($id) {
        Admin::destroy($id);

		Session::flash('successStatus', __('bsw.deleteSuccessStatus'));

        return redirect()->route('adminStartPoint');
    }
}
