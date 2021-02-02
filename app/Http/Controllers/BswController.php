<?php
namespace App\Http\Controllers;

use App\Bsw;
use App\Module;
use App\Language;
use Illuminate\Http\Request;


class BswController extends Controller {
	public function getStartPoint() {
		return view('modules.bsw.admin_panel.start_point', ['modules' => Module :: all(),
															'languages' => Language :: where('published', 1) -> get(),
															'bsws' => Bsw :: all() -> sortBy('system_word')]);
	}

	
	public function add() {
		$bsw = new Bsw();

		$bsw -> save();

		return redirect() -> route('bswEdit', $bsw -> id);
	}

	
	public function edit($id) {
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

		
		return view('modules.bsw.admin_panel.edit', ['modules' => Module :: all(),
													 'languages' => Language :: where('published', 1) -> get(),
													 'bsws' => Bsw :: all() -> sortBy('system_word'),
													 'bsw' => Bsw :: find($id),
													 'prevBswId' => $prevId,
													 'nextBswId' => $nextId]);
	}


	public function update(Request $request, $id) {
		$bsw = Bsw :: find($id);

		$bsw -> system_word = (!is_null($request -> input('system_word')) ? $request -> input('system_word') : '');

		foreach(Language :: where('published', 1) -> get() as $data) {
			$varWord = 'word_'.$data -> title;
			
			$bsw -> $varWord = (!is_null($request -> input('word_'.$data -> title)) ? $request -> input('word_'.$data -> title) : '');
		}

		$bsw -> save();

		return redirect() -> route('bswEdit', $bsw -> id);
	}


	public function delete($id) {
		Bsw :: destroy($id);

		return redirect() -> route('bswStartPoint');
	}
}
