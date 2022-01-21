<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;

class AContactsController extends AController {
    public function edit() {
        $bswAddress = Bsw :: find(430); 

		$data = array_merge(self :: getDefaultData(), ['address_ge' => $bswAddress -> word_ge, 
                                                        'address_en' => $bswAddress -> word_en, 
                                                        'address_ru' => $bswAddress -> word_ru]);

		return view('modules.contacts.admin_panel.start_point', $data);
	}


    public function update(Request $request) {
        // Validation
            $validator = Validator :: make($request -> all(), array(
                'admin_email' => 'required|email|max:255',
                'facebook_link' => 'max:255',
                'instagram_link' => 'max:255',
                'twitter_link' => 'max:255',
                'phone_number' => 'max:255',
                'cordinate_x' => 'max:255',
                'cordinate_y' => 'max:255'
            ));
            
            if($validator -> fails()) {
                return redirect() -> route('contactsEdit') -> withErrors($validator) -> withInput();
            }
		//
        
        $bsc = Bsc :: find(344);
		$bsc -> configuration = $request -> input('admin_email');
		$bsc -> save();

        $bsc = Bsc :: find(706);
		$bsc -> configuration = $request -> input('facebook_link');
		$bsc -> save();

        $bsc = Bsc :: find(707);
		$bsc -> configuration = $request -> input('instagram_link');
		$bsc -> save();

        $bsc = Bsc :: find(708);
		$bsc -> configuration = $request -> input('twitter_link');
		$bsc -> save();

        $bsc = Bsc :: find(488);
		$bsc -> configuration = $request -> input('phone_number');
		$bsc -> save();

        $bsc = Bsc :: find(709);
		$bsc -> configuration = $request -> input('cordinate_x');
		$bsc -> save();

        $bsc = Bsc :: find(710);
		$bsc -> configuration = $request -> input('cordinate_y');
		$bsc -> save();

        $bsc = Bsc :: find(711);
		$bsc -> configuration = $request -> input('map_number');
		$bsc -> save();

        $bsw = Bsw :: find(430);
		$bsw -> word_ge = $request -> input('address_ge');
		$bsw -> word_en = $request -> input('address_en');
		$bsw -> word_ru = $request -> input('address_ru');
		$bsw -> save();

        // Status for success.
            $request -> session() -> flash('successStatus', __('bsw.successStatus'));
        //

		return redirect() -> route('contactsEdit');
	}
}
