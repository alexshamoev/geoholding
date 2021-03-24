<?php

namespace App\Http\Controllers;

use App\Module;
use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
	public function getStartPoint() {
		return view('modules.languages.admin_panel.start_point', ['modules' => Module :: all(),
																  'languages' => Language :: all() -> sortBy('title')]);
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

		foreach(Language :: all() -> sortBy('title') as $data) {
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

		return view('modules.languages.admin_panel.edit', ['modules' => Module :: all(),
															'languages' => Language :: all() -> sortBy('title'),
															'language' => Language :: find($id),
															'prevLanguageId' => $prevId,
															'nextLanguageId' => $nextId]);
	}


	public function update(Request $request, $id) {
		$language = Language :: find($id);

		$language -> title = (!is_null($request -> input('title')) ? $request -> input('title') : '');
		$language -> full_title = (!is_null($request -> input('full_title')) ? $request -> input('full_title') : '');
		$language -> like_default = (!is_null($request -> input('like_default')) ? $request -> input('like_default') : 0);
		$language -> like_default_for_admin = (!is_null($request -> input('like_default_for_admin')) ? $request -> input('like_default_for_admin') : 0);

		$language -> save();

		return redirect() -> route('languageEdit', $language -> id);
	}


	public function delete($id) {
		Language :: destroy($id);

		return redirect() -> route('languageStartPoint');
	}


	public function updateStartPoint(Request $request) {

		

		$language = Language :: find($request -> input('like_default'));

		$language -> like_default = 1;

		$language -> save();

		return redirect() -> route('languageStartPoint');
	}
}
