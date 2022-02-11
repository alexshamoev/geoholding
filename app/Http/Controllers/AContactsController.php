<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Module;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AContactsUpdateRequest;

class AContactsController extends AController {
    public function edit() {
        $bswAddress = Bsw :: find(430); 

		$data = array_merge(self :: getDefaultData(), ['module' => Module :: where('alias', 'contacts') -> first(),
                                                        'address_ge' => $bswAddress -> word_ge, 
                                                        'address_en' => $bswAddress -> word_en, 
                                                        'address_ru' => $bswAddress -> word_ru]);

		return view('modules.contacts.admin_panel.start_point', $data);
	}


    public function update(AContactsUpdateRequest $request) {        
        $bsc = Bsc :: where('system_word', 'admin_email') -> first();
		$bsc -> configuration = $request -> input('admin_email');
		$bsc -> save();

        $bsc = Bsc :: where('system_word', 'facebook_link') -> first();
		$bsc -> configuration = $request -> input('facebook_link');
		$bsc -> save();

        $bsc = Bsc :: where('system_word', 'instagram_link') -> first();
		$bsc -> configuration = $request -> input('instagram_link');
		$bsc -> save();

        $bsc = Bsc :: where('system_word', 'twitter_link') -> first();
		$bsc -> configuration = $request -> input('twitter_link');
		$bsc -> save();

        $bsc = Bsc :: where('system_word', 'phone_number') -> first();
		$bsc -> configuration = $request -> input('phone_number');
		$bsc -> save();

        $bsc = Bsc :: where('system_word', 'cordinate_x') -> first();
		$bsc -> configuration = $request -> input('cordinate_x');
		$bsc -> save();

        $bsc = Bsc :: where('system_word', 'cordinate_y') -> first();
		$bsc -> configuration = $request -> input('cordinate_y');
		$bsc -> save();

        $bsc = Bsc :: where('system_word', 'map_number') -> first();
		$bsc -> configuration = $request -> input('map_number');
		$bsc -> save();

        $bsw = Bsw :: where('system_word', 'address') -> first();
		$bsw -> word_ge = $request -> input('address_ge');
		$bsw -> word_en = $request -> input('address_en');
		$bsw -> word_ru = $request -> input('address_ru');
		$bsw -> save();

        
        $request -> session() -> flash('successStatus', __('bsw.successStatus')); // Status for success.

		return redirect() -> route('contactsEdit');
	}
}
