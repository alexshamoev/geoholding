<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use DB;
use App;


class ReactTestController extends Controller {
    public function get(Request $request) {
        App :: setLocale($request -> input('lang'));


        $searchWord = '';
	
        if($request -> input('q')) {
            $searchWord = $request -> input('q');
        }
        
        $searchWord = urldecode($searchWord);
        
        $searchWord = preg_replace("/[^A-ZА-ЯЁა-ჰ0-9 -]+/ui",
                                    '',
                                    $searchWord);
        

        $result = false;

        if($searchWord) {
            $result = Page :: where('title_'.App :: getLocale(), 'like', '%'.$searchWord.'%') -> get();
        }

        return response() -> json($result);
    }
}
