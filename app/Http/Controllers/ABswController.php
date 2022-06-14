<?php
namespace App\Http\Controllers;

use App\Models\Bsw;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\ABswUpdateRequest;
use Session;


class ABswController extends AController {
	public function getStartPoint() {
		$data = array_merge(self :: getDefaultData(), ['languages' => Language :: where('disable', 1) -> get(),
														'bsws' => Bsw :: all() -> sortBy('system_word')]);
		
		return view('modules.bsw.admin_panel.start_point', $data);
	}

	
	public function add() {
		return view('modules.bsw.admin_panel.add', self :: getDefaultData());
	}


	public function insert(ABswUpdateRequest $request) {
		$bsw = new Bsw();

		$bsw -> system_word = $request -> input('system_word');

		foreach(Language :: where('disable', 0) -> get() as $data) {
			$bsw -> { 'word_'.$data -> title } = $request -> input('word_'.$data -> title);
		}

		$bsw -> save();

		
		$request -> session() -> flash('successStatus', __('bsw.successStatus')); // Status for success.

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

		$data = array_merge(self :: getDefaultData(), ['bsws' => Bsw :: all() -> sortBy('system_word'),
														'activeBsw' => Bsw :: find($id),
														'prevBswId' => $prevId,
														'nextBswId' => $nextId]);
		
		return view('modules.bsw.admin_panel.edit', $data);
	}


	public function update(ABswUpdateRequest $request, $id) {
		$bsw = Bsw :: find($id);

		$bsw -> system_word = $request -> input('system_word');

		foreach(Language :: where('disable', 0) -> get() as $data) {
			$bsw -> { 'word_'.$data -> title } = $request -> input('word_'.$data -> title);
		}

		$bsw -> save();

		
		$request -> session() -> flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect() -> route('bswEdit', $bsw -> id);
	}


	public function delete($id) {
		Bsw :: destroy($id);

		Session :: flash('successStatus', __('bsw.deleteSuccessStatus')); // Status for success.

		return redirect() -> route('bswStartPoint');
	}
}
