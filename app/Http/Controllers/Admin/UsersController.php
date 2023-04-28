<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Module;
use App\Models\User;
use App\Http\Requests\ALanguageUpdateRequest;
use Session;
use App\Http\Controllers\AController;

class UsersController extends AController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array_merge(self::getDefaultData(),
									[
										'module' => Module::firstWhere('alias', 'users'),
										'users' => User::all()->sortByDesc('id')
									]);
        
		return view('modules.users.admin_panel.start_point', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

		return redirect()->route('users.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

		Session::flash('successStatus', __('bsw.deleteSuccessStatus'));

        return redirect()->route('users.index');
    }
}