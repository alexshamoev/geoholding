<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AController;
use Illuminate\Http\Request;
use Session;
use App\Models\Bsw;
use App\Models\Language;
use App\Http\Requests\ABswUpdateRequest;


class BswController extends AController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array_merge(self::getDefaultData(), ['languages' => Language::where('disable', 1)->get(),
														'bsws' => Bsw::all()->sortBy('system_word')]);
		
		return view('modules.bsw.admin_panel.start_point', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.bsw.admin_panel.add', self::getDefaultData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bsw = new Bsw();

		$bsw->system_word = $request->input('system_word');

		foreach(Language::where('disable', 0)->get() as $data) {
			$bsw->{ 'word_'.$data->title } = $request->input('word_'.$data->title);
		}

		$bsw->save();

		
		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect()->route('bsw.edit', $bsw->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bsw = Bsw::find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(Bsw::all()->sortBy('system_word') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data->id;
			}
			
			if($bsw->id === $data->id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data->id;
			}
		}

		$data = array_merge(self::getDefaultData(), ['bsws' => Bsw::all()->sortBy('system_word'),
														'activeBsw' => Bsw::find($id),
														'prevBswId' => $prevId,
														'nextBswId' => $nextId]);
		
		return view('modules.bsw.admin_panel.edit', $data);
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
        $bsw = Bsw::find($id);

		$bsw->system_word = $request->input('system_word');

		foreach(Language::where('disable', 0)->get() as $data) {
			$bsw->{ 'word_'.$data->title } = $request->input('word_'.$data->title);
		}

		$bsw->save();

		
		$request->session()->flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect()->route('bsw.edit', $bsw->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bsw::destroy($id);

		Session::flash('successStatus', __('bsw.deleteSuccessStatus')); // Status for success.

		return redirect()->route('bsw.index');
    }
}
