<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AController;
use App\Models\Bsc;
use App\Http\Requests\ABscUpdateRequest;
use Session;


class BscController extends AController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array_merge(self::getDefaultData(), ['bscs' => Bsc::all()->sortBy('system_word')]);

		return view('modules.bsc.admin_panel.start_point', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.bsc.admin_panel.add', self::getDefaultData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bsc = new Bsc();

		$bsc->system_word = $request->input('system_word');
		$bsc->configuration = $request->input('configuration');

		$bsc->save();

		
		$request->session()->flash('successStatus', __('bsw.successStatus'));

		return redirect()->route('bsc.edit', $bsc->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bsc = Bsc::find($id);

		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(Bsc::all()->sortBy('system_word') as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data->id;
			}
			
			if($bsc->id === $data->id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			} 
			
			if(!$prevIdIsSaved) {
				$prevId = $data->id;
			}
		}

		$data = array_merge(self::getDefaultData(), ['bscs' => Bsc::all()->sortBy('system_word'),
														'activeBsc' => Bsc::find($id),
														'prevBscId' => $prevId,
														'nextBscId' => $nextId]);

		return view('modules.bsc.admin_panel.edit', $data);
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
        $bsc = Bsc::find($id);

		$bsc->system_word = $request->input('system_word');
		$bsc->configuration = $request->input('configuration');

		$bsc->save();

		
		$request->session()->flash('successStatus', __('bsw.successStatus'));

		return redirect()->route('bsc.edit', $bsc->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bsc::destroy($id);

		Session::flash('successStatus', __('bsw.deleteSuccessStatus'));

		return redirect()->route('bsc.index');
    }
}
