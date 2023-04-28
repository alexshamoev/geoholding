<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Admin;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AController;
use App\Http\Requests\AAdminUpdateRequest;


class AdminController extends AController
{
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array_merge(self::getDefaultData(), ['module' => Module::firstWhere('alias', 'admins')]);

		return view('modules.admins.admin_panel.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();

		$admin->name = $request->input('name');
		$admin->email = $request->input('email');
		$admin->password = Hash::make($request->input('password'));
		$admin->save();

		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect(route('admins.edit', $admin->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

		$admin->name = $request->input('name');
		$admin->email = $request->input('email');
		$admin->password = Hash::make($request->input('password'));
		$admin->save();

		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect(route('admins.edit', $admin->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);

		Session::flash('successStatus', __('bsw.deleteSuccessStatus'));

        return redirect()->route('admins.index');
    }
}
