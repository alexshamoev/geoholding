<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\MenuButton;
use App\Models\Language;
use App\Models\Module;
use App\Models\Bsc;
use App\Models\Bsw;
use App\Models\Contact;
use App\Models\NewsStep0;
use App\Models\NewsStep1;
use App\Models\NewsStep2;
use App\Models\NewsStep3;
use App\Models\Partner;
use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class ContactsController extends Controller {
    private const PAGE_SLUG = 'contact';

    public static function getStep0($lang) {
        
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();
        $language = Language :: where('title', $lang) -> first();

        Page :: setLang($language -> title);

        $data = array_merge(PageController :: getDefaultData($language, $page));

        return view('modules.contacts.step0', $data);
    }

    public function update(Request $request) {
        $language = Language :: where('title', 'en') -> first();
        $page = Page :: where('slug', self :: PAGE_SLUG) -> first();

        Page :: setLang($language -> title);

		$contacts = new Contact();

        $contacts -> name = $request -> input('name');
        $contacts -> last_name = $request -> input('lastName');
        $contacts -> email = $request -> input('email');
        $contacts -> phone = $request -> input('phone');
        $contacts -> address = $request -> input('address');
        $contacts -> comment = $request -> input('comment');

        $contacts -> save();
        // dd($email);

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

        $arrayEmails = ['lashalashka61@gmail.com'];
        $emailSubject = 'My Subject';
        $emailBody = 'Hello, this is my message content.';
        $data = array_merge(PageController :: getDefaultData($language, $page));

        $dataEmail = array('name'=>"Virat Gandhi");
        Mail::send(['text'=>'mail'], $dataEmail, function($message) {
            $message->to('lashalashka61@gmail.com', 'Tutorials Point')->subject
               ('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com','Virat Gandhi');
         });


		return view('modules.contacts.step0', $data);
	}

}
