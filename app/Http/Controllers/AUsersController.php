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
use Session;


class AUsersController extends AController {
    public function getStartPoint() {
        $data = array_merge(self::getDefaultData(),
									[
										'module' => Module::firstWhere('alias', 'users'),
										'users' => User::all()->sortByDesc('id')
									]);
        
		return view('modules.users.admin_panel.start_point', $data);
    }


    public function edit($id) {
		$admin = User::find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(User::all()->where('admin', 0)->sortBy('id') as $data) {
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

		$data = array_merge(self::getDefaultData(), ['module' => Module::firstWhere('alias', 'users'),
                                                        'user' => User::find($id),
                                                        'prevUsersId' => $prevId,
                                                        'nextUsersId' => $nextId]);

		return view('modules.users.admin_panel.edit', $data);
	}


	public function update(Request $request, $id) {
		$validated = $request->validate([
            'name' => 'required',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:5',
            'address' => 'required|max:255'
        ]);

		if($request->hasFile('profile_image')) {
			$request->file('profile_image')->storeAs('public/images/modules/users/', $id.'.jpg');
		}

		$user = User::find($id);
		$user->name = $request->input('name');
		$user->last_name = $request->input('last_name');
		$user->email = $request->input('email');
		$user->phone = $request->input('phone');
		$user->address = $request->input('address');
		$user->save();

		return redirect()->route('userEdit', $id);
	}

	
    public function delete($id) {
        User::destroy($id);

		Session::flash('successStatus', __('bsw.deleteSuccessStatus'));

        return redirect()->route('userStartPoint');
    }
}
