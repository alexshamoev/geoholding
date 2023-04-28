<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Http\Requests\ALanguageUpdateRequest;
use Session;
use App\Http\Controllers\AController;


class LanguageController extends AController
{
    public function updateStartPoint(Request $request) {
        Language::where('disable', 0)->update(['like_default' => 0,
												'like_default_for_admin' => 0]);

		$language = Language::find($request->input('like_default'));
		$language->like_default = 1;
		$language->save();

		$language = Language::find($request->input('like_default_for_admin'));
		$language->like_default_for_admin = 1;
		$language->save();

		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.
		
		return redirect()->route('languages.index');
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array_merge(self::getDefaultData(), []);

		return view('modules.languages.admin_panel.start_point', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.languages.admin_panel.add', self::getDefaultData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $language = new Language();

		$language->title = $request->input('title');
		$language->full_title = $request->input('full_title');

		$language->save();
		

		if($request->file('svg_icon_languages')) {
			$filePath = $request->file('svg_icon_languages')->storeAs('images/modules/languages',
																			$language->id.'.svg',
																			'public');
		}


		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect()->route('languages.edit', $language->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(Language::all()->sortByDesc('rang') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data->id;
			}
			
			if($language->id === $data->id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data->id;
			}
		}

		$data = array_merge(self::getDefaultData(), ['languages' => Language::all()->sortBy('title'),
														'language' => Language::find($id),
														'prevLanguageId' => $prevId,
														'nextLanguageId' => $nextId]);

		return view('modules.languages.admin_panel.edit', $data);
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
        $language = Language::find($id);

		$language->title = $request->input('title');
		$language->full_title = $request->input('full_title');

		$language->save();
		

		if($request->file('svg_icon_languages')) {
			$filePath = $request->file('svg_icon_languages')->storeAs('images/modules/languages',
																			$language->id.'.svg',
																			'public');
		}


		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect()->route('languages.edit', $language->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Language::destroy($id);

		Session::flash('successDeleteStatus', __('bsw.deleteSuccessStatus'));

		return redirect()->route('languages.index');
    }
}
