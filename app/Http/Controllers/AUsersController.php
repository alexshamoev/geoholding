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

class AUsersController extends AController
{
    public function getStartPoint() {
        $activeUser = Auth :: user();

        $data = array_merge(self :: getDefaultData(), ['module' => Module :: where('alias', 'users') -> first(),
                                                        'users' => User :: all() -> where('admin', '0') -> sortBy('id')]);
        

		return view('modules.users.admin_panel.start_point', $data);
    }


    public function edit($id) {
		$admin = User :: find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(User :: all() -> where('admin', 0) -> sortBy('id') as $data) {
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

		$data = array_merge(self :: getDefaultData(), ['module' => Module :: where('alias', 'users') -> first(),
                                                        'users' => User :: all() -> sortBy('email'),
                                                        'activeAdmin' => User :: find($id),
                                                        'name' => $admin -> name,
                                                        'email' => $admin -> email,
                                                        'prevUsersId' => $prevId,
                                                        'nextUsersId' => $nextId]);

		return view('modules.users.admin_panel.edit', $data);
	}

    public function delete($id) {
        User :: destroy($id);

        return redirect() -> route('userStartPoint');
    }
}
