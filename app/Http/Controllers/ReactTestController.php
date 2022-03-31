<?php

namespace App\Http\Controllers;

use App\Models\PhotoGalleryStep0;
use Illuminate\Http\Request;
use DB;


class ReactTestController extends FrontController {
    public function get(Request $request) {
        // $rang = 0;
        // $i = 0;

        // foreach(array_reverse($request -> input('idsArray')) as $id) {
        //     DB :: table($request -> input('db_table')) -> where('id', $id) -> update(['rang' => $rang]);

        //     $rang = ($i + 1) * 5;
        //     $i++;
        // }

        // return response() -> json(['success' => 'Ajax request submitted successfully '.$request -> input('db_table').' '.print_r($request -> input('idsArray'))]);
        return response() -> json(['success' => $request -> input('id')]);
    }
}
