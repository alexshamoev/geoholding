<?php
namespace App\Http\Controllers;

use App\Bsc;
use App\Module;
use Illuminate\Http\Request;


class BscController extends Controller {
	public function getStartPoint() {
		return view('modules.bsc.admin_panel.start_point', ['modules' => Module :: all(),
															'bscs' => Bsc :: all() -> sortBy('system_word')]);
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

		
		return view('modules.bsc.admin_panel.edit', [
			'modules' => Module :: all(),
			'bscs' => Bsc :: all() -> sortBy('system_word'),
			'bsc' => Bsc :: find($id),
			'prevBscId' => $prevId,
			'nextBscId' => $nextId
		]);
	}


	public function update(Request $request, $id) {
		$bsc = Bsc :: find($id);

		$bsc -> system_word = (!is_null($request -> input('system_word')) ? $request -> input('system_word') : '');
		$bsc -> configuration = (!is_null($request -> input('configuration')) ? $request -> input('configuration') : '');

		$bsc -> save();

		return redirect() -> route('bscEdit', $bsc -> id);
	}


	public function delete($id) {
		Bsc :: destroy($id);

		return redirect() -> route('bscStartPoint');
	}
}
