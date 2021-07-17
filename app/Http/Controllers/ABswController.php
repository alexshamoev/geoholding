<?php
namespace App\Http\Controllers;

use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use App\ADefaultData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;


class ABswController extends Controller {
	public function getStartPoint() {
		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['languages' => Language :: where('published', 1) -> get(),
											'bsws' => Bsw :: all() -> sortBy('system_word')]);
		
		return view('modules.bsw.admin_panel.start_point', $data);
	}

	
	public function add() {
		$bsw = new Bsw();

		$bsw -> save();

		return redirect() -> route('bswEdit', $bsw -> id);
	}

	
	public function edit(Request $request, $id) {
		$bsw = Bsw :: find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(Bsw :: all() -> sortBy('system_word') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($bsw -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}


		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['languages' => Language :: where('published', 1) -> get(),
											'bsws' => Bsw :: all() -> sortBy('system_word'),
											'activeBsw' => Bsw :: find($id),
											'prevBswId' => $prevId,
											'nextBswId' => $nextId]);
		
		return view('modules.bsw.admin_panel.edit', $data);
	}


	public function update(Request $request, $id) {
		$bsw = Bsw :: find($id);


		// Validation
			$dataForValidation = array(
				'system_word' => 'required|min:2|max:255'
			);

			foreach(Language :: where('published', 1) -> get() as $data) {
				$dataForValidation['word_'.$data -> title] = 'max:255';
			}
			
			$validator = Validator :: make($request -> all(), $dataForValidation);

			if($validator -> fails()) {
				return redirect() -> route('bswEdit', $bsw -> id) -> withErrors($validator) -> withInput();
			}
		//


		$bsw -> system_word = $request -> input('system_word');

		foreach(Language :: where('published', 1) -> get() as $data) {
			$varWord = 'word_'.$data -> title;
			
			$bsw -> $varWord = $request -> input('word_'.$data -> title);
		}

		$bsw -> save();

		return redirect() -> route('bswEdit', $bsw -> id);
	}


	public function delete($id) {
		Bsw :: destroy($id);

		return redirect() -> route('bswStartPoint');
	}
}
