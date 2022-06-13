<?php

namespace App\Http\Controllers;

use DB;
use App;
use App\Models\Page;
use App\Models\NewsStep0;
use App\Models\NewsStep1;
use App\Models\NewsStep2;
use App\Models\NewsStep3;
use App\Models\ProductStep0;
use App\Models\ProductStep1;
use App\Models\ProductStep2;
use Illuminate\Http\Request;
use App\Models\PhotoGalleryStep0;


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
							->orWhere('alias_ge', 'like', '%'.$searchWord.'%')
							->orWhere('alias_en', 'like', '%'.$searchWord.'%')
							->orWhere('alias_ru', 'like', '%'.$searchWord.'%')
							->orWhere('text_ge', 'like', '%'.$searchWord.'%')
							->orWhere('text_en', 'like', '%'.$searchWord.'%')
							->orWhere('text_ru', 'like', '%'.$searchWord.'%')
							->get() as $data) {
				$result[$i]['title'] = $data -> title;
				$result[$i]['fullUrl'] = $data -> fullUrl;
				$result[$i]['text'] = $data -> text;

				$i++;
			}

			foreach(NewsStep0::where('title_ge', 'like', '%'.$searchWord.'%')
							->orWhere('title_en', 'like', '%'.$searchWord.'%')
							->orWhere('title_ru', 'like', '%'.$searchWord.'%')
							->orWhere('text_ge', 'like', '%'.$searchWord.'%')
							->orWhere('text_en', 'like', '%'.$searchWord.'%')
							->orWhere('text_ru', 'like', '%'.$searchWord.'%')
							->get() as $data) {
				$result[$i]['title'] = $data -> title;
				$result[$i]['fullUrl'] = $data -> fullUrl;
				$result[$i]['text'] = $data -> text;
				
				$i++;
			}

			// foreach(NewsStep1::where('title_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_ru', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ru', 'like', '%'.$searchWord.'%')
			// 				->get() as $data) {
			// 	$result[$i]['title'] = $data -> title;
			// 	$result[$i]['fullUrl'] = $data -> fullUrl;
			// 	$result[$i]['text'] = $data -> text;
				
			// 	$i++;
			// }

			// foreach(NewsStep2::where('title_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_ru', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ru', 'like', '%'.$searchWord.'%')
			// 				->get() as $data) {
			// 	$result[$i]['title'] = $data -> title;
			// 	$result[$i]['fullUrl'] = $data -> fullUrl;
			// 	$result[$i]['text'] = $data -> text;
				
			// 	$i++;
			// }

			// foreach(NewsStep3::where('title_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_ru', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ru', 'like', '%'.$searchWord.'%')
			// 				->get() as $data) {
			// 	$result[$i]['title'] = $data -> title;
			// 	$result[$i]['fullUrl'] = $data -> fullUrl;
			// 	$result[$i]['text'] = $data -> text;
				
			// 	$i++;
			// }

			// foreach(PhotoGalleryStep0::where('title_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_ru', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ru', 'like', '%'.$searchWord.'%')
			// 				->get() as $data) {
			// 	$result[$i]['title'] = $data -> title;
			// 	$result[$i]['fullUrl'] = $data -> fullUrl;
			// 	$result[$i]['text'] = $data -> text;
				
			// 	$i++;
			// }

			// foreach(ProductStep0::where('title_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_ru', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ru', 'like', '%'.$searchWord.'%')
			// 				->get() as $data) {
			// 	$result[$i]['title'] = $data -> title;
			// 	$result[$i]['fullUrl'] = $data -> fullUrl;
			// 	$result[$i]['text'] = $data -> text;
				
			// 	$i++;
			// }

			// foreach(ProductStep1::where('title_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_ru', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ru', 'like', '%'.$searchWord.'%')
			// 				->get() as $data) {
			// 	$result[$i]['title'] = $data -> title;
			// 	$result[$i]['fullUrl'] = $data -> fullUrl;
			// 	$result[$i]['text'] = $data -> text;
				
			// 	$i++;
			// }

			// foreach(ProductStep2::where('title_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('title_ru', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ge', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_en', 'like', '%'.$searchWord.'%')
			// 				->orWhere('text_ru', 'like', '%'.$searchWord.'%')
			// 				->get() as $data) {
			// 	$result[$i]['title'] = $data -> title;
			// 	$result[$i]['fullUrl'] = $data -> fullUrl;
			// 	$result[$i]['text'] = $data -> text;
				
			// 	$i++;
			// }
		}

        return response()->json($result);
    }
}
