<?php
namespace App\Http\Controllers;

use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use App\ADefaultData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ABscController extends Controller {
	public function getStartPoint() {
		self :: deleteEmpty();


		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['bscs' => Bsc :: all() -> sortBy('system_word')]);

		return view('modules.bsc.admin_panel.start_point', $data);
	}

	
	public function add() {
		$bsc = new Bsc();

		$bsc -> system_word = '';
		$bsc -> configuration = '';

		$bsc -> save();

		return redirect() -> route('bscEdit', $bsc -> id);
	}
	
	
	public function edit($id) {
		$bsc = Bsc :: find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(Bsc :: all() -> sortBy('system_word') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($bsc -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}

		$defaultData = ADefaultData :: get();

		$data = array_merge($defaultData, ['bscs' => Bsc :: all() -> sortBy('system_word'),
											'activeBsc' => Bsc :: find($id),
											'prevBscId' => $prevId,
											'nextBscId' => $nextId]);

		return view('modules.bsc.admin_panel.edit', $data);
	}


	public function update(Request $request, $id) {
		$bsc = Bsc :: find($id);


		// Validation
			$validator = Validator :: make($request -> all(), array(
				'system_word' => 'required|min:2|max:255',
				'configuration' => 'required|nullable|max:255'
			));

			if($validator -> fails()) {
				return redirect() -> route('bscEdit', $bsc -> id) -> withErrors($validator) -> withInput();
			}
		//


		$bsc -> system_word = $request -> input('system_word');
		$bsc -> configuration = $request -> input('configuration');

		$bsc -> save();

		// Status for success.
			$request -> session() -> flash('successStatus', __('bsw.successStatus'));
        //

		return redirect() -> route('bscEdit', $bsc -> id);
	}


	public function delete($id) {
		Bsc :: destroy($id);

		return redirect() -> route('bscStartPoint');
	}

	
	private static function deleteEmpty() {
		$validateRules = array(
			'system_word' => 'required|min:2',
			'configuration' => 'nullable'
		);
		
		foreach(Bsc :: all() as $data) {
			$bscData['system_word'] = $data -> system_word;

			// Validation
				$validator = Validator :: make($bscData, $validateRules);

				if($validator -> fails()) {
					Bsc :: destroy($data -> id);
				}
			//
		}
	}
}
