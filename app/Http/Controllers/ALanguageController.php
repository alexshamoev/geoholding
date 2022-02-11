<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Language;
use App\Models\Bsc;
use App\Models\Bsw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ALanguageUpdateRequest;


class ALanguageController extends AController {
	public function getStartPoint() {
		self :: deleteEmptyBlocks();


		$bsc = Bsc :: getFullData();
		$copyrightDate = $bsc -> year_of_site_creation;

		if($bsc -> year_of_site_creation < date('Y')) {
			$copyrightDate .= ' - '.date('Y');
		}

		$data = array_merge(self :: getDefaultData(), ['languages' => Language :: all() -> sortByDesc('rang')]);

		return view('modules.languages.admin_panel.start_point', $data);
	}
	
	
	public function add() {
		$language = new Language();

		$language -> save();

		return redirect() -> route('languageEdit', $language -> id);
	}


	public function edit($id) {
		$language = Language :: find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(Language :: all() -> sortByDesc('rang') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($language -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}

		$data = array_merge(self :: getDefaultData(), ['languages' => Language :: all() -> sortBy('title'),
														'language' => Language :: find($id),
														'prevLanguageId' => $prevId,
														'nextLanguageId' => $nextId]);

		return view('modules.languages.admin_panel.edit', $data);
	}


	public function update(ALanguageUpdateRequest $request, $id) {
		$language = Language :: find($id);

		$language -> title = $request -> input('title');
		$language -> full_title = $request -> input('full_title');

		$language -> save();
		

		if($request -> file('svg_icon_languages')) {
			$filePath = $request -> file('svg_icon_languages') -> storeAs('images/modules/languages',
																			$language -> id.'.svg',
																			'public');
		}


		$request -> session() -> flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect() -> route('languageEdit', $language -> id);
	}


	public function delete($id) {
		Language :: destroy($id);

		return redirect() -> route('languageStartPoint');
	}


	public function updateStartPoint(Request $request) {
		Language :: where('disable', 0) -> update(['like_default' => 0,
													'like_default_for_admin' => 0]);

		$language = Language :: find($request -> input('like_default'));
		
		$language -> like_default = 1;

		$language -> save();

		$language = Language :: find($request -> input('like_default_for_admin'));
		
		$language -> like_default_for_admin = 1;

		$language -> save();
		
		return redirect() -> route('languageStartPoint');
	}
}
