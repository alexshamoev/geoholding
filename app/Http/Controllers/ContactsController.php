<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;

class ContactsController extends Controller {
    private const PAGE_SLUG = 'contact';

    public function submit(Request $request) {
		$this -> validate($request, [
			'name' => 'required|min:2|max:255',
			'email' => 'required|min:4'
		]);


        $contact = new Contact();

        $contact -> name = $request -> input('name');
        $contact -> subject = $request -> input('email');
        $contact -> text = 'Temp text';

        $contact -> save();

        
        return redirect() -> route('contact') -> with('success', 'Its OK!');
    }

    public static function getStep0($lang) {
        
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();

        Page :: setLang($language -> title);

        $data = array_merge(PageController :: getDefaultData($language, $page));

        return view('modules.contacts.step0', $data);
    }

    public function update(Request $request) {
		// $bsc = Bsc :: find($id);
        dd(123);

		// // Validation
		// 	$validator = Validator :: make($request -> all(), array(
		// 		'system_word' => 'required|min:2|max:255',
		// 		'configuration' => 'required|nullable|max:255'
		// 	));

		// 	if($validator -> fails()) {
		// 		return redirect() -> route('bscEdit', $bsc -> id) -> withErrors($validator) -> withInput();
		// 	}
		// //


		// $bsc -> system_word = $request -> input('system_word');
		// $bsc -> configuration = $request -> input('configuration');

		// $bsc -> save();

		// // Status for success.
		// 	$request -> session() -> flash('successStatus', __('bsw.successStatus'));
        // //

		return view('modules.contacts.step0');
	}

    public function test() {
        dd(23233);
    }

}
