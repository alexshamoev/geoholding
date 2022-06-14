<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ARangController extends AController {
    public function set(Request $request) {
        $rang = 0;
        $i = 0;

        foreach(array_reverse($request -> input('idsArray')) as $id) {
            DB :: table($request -> input('db_table')) -> where('id', $id) -> update(['rang' => $rang]);
            $i++;
            $rang = $i * 5;
        }

        return response() -> json(['success' => 'Ajax request submitted successfully '.$request -> input('db_table').' '.print_r($request -> input('idsArray'))]);
    }
}
