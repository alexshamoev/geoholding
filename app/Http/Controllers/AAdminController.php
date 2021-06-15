<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use App\ADefaultData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AAdminController extends Controller {
    public function getAdd() {
        return view('modules.admins.admin_panel.add', ADefaultData :: get());
    }


    public function save(Request $request) {
        if(Auth :: check()) {
            return redirect('/admin');
        }

        $validateFields = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User :: create($validateFields);

        if($user) {
            Auth :: login($user);

            return redirect('/admin');
        }

        return redirect(route('admin.login')) -> withErrors([
            'formError' => 'მოხდა ავტორიზაციის შეცდომა'
        ]);
    }


    public function logout() {
        if(Auth :: check()) {
            Auth :: logout();
        }

        return redirect('/admin');
    }
}
