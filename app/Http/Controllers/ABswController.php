<?php
namespace App\Http\Controllers;

use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ABswController extends AController {
	public function getStartPoint() {
		self :: deleteEmpty();


		$data = array_merge(self :: getDefaultData(), ['languages' => Language :: where('disable', 1) -> get(),
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

		$data = array_merge(self :: getDefaultData(), ['languages' => Language :: where('disable', 0) -> get(),
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
			
			$validator = Validator :: make($request -> all(), $dataForValidation);

			if($validator -> fails()) {
				return redirect() -> route('bswEdit', $bsw -> id) -> withErrors($validator) -> withInput();
			}
		//


		$bsw -> system_word = $request -> input('system_word');

		foreach(Language :: where('disable', 0) -> get() as $data) {
			$bsw -> { 'word_'.$data -> title } = $request -> input('word_'.$data -> title);
		}

		$bsw -> save();

		// Status for success.
			$request -> session() -> flash('successStatus', __('bsw.successStatus'));
        //

		return redirect() -> route('bswEdit', $bsw -> id);
	}


	public function delete($id) {
		Bsw :: destroy($id);

		return redirect() -> route('bswStartPoint');
	}

	
	private static function deleteEmpty() {
		$validateRules = array(
			'system_word' => 'required|min:2'
		);
		
		foreach(Bsw :: all() as $data) {
			$bswData['system_word'] = $data -> system_word;

			// Validation
				$validator = Validator :: make($bswData, $validateRules);

				if($validator -> fails()) {
					Bsw :: destroy($data -> id);
				}
			//
		}
	}
}
