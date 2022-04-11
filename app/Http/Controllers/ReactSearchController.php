<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use DB;
use App;


class ReactSearchController extends Controller {
    public function get(Request $request) {
        App::setLocale($request->input('lang'));


        $searchWord = '';
	
        if($request->input('q')) {
            $searchWord = $request->input('q');
        }
        
        $searchWord = urldecode($searchWord);
        
        $searchWord = preg_replace("/[^A-ZА-ЯЁა-ჰ0-9 -]+/ui",
                                    '',
                                    $searchWord);
        

		$result = [];

		if($searchWord) {
			$i = 0;

			foreach(Page::where('title_ge', 'like', '%'.$searchWord.'%')
							->orWhere('title_en', 'like', '%'.$searchWord.'%')
							->orWhere('title_ru', 'like', '%'.$searchWord.'%')
							->get() as $data) {
				$result[$i]['title'] = $data -> title;
				$result[$i]['fullUrl'] = $data -> fullUrl;
				$result[$i]['text'] = $data -> text;

				$i++;
			}
		}

        return response()->json($result);
    }
}
