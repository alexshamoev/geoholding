<?php
namespace App\Http\Controllers;

use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ABscController extends AController {
	public function getStartPoint() {
		Bsc :: deleteEmpty();

		$data = array_merge(self :: getDefaultData(), ['bscs' => Bsc :: all() -> sortBy('system_word')]);

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

		$data = array_merge(self :: getDefaultData(), ['bscs' => Bsc :: all() -> sortBy('system_word'),
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
}
