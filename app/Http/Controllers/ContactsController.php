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
        $name = $request -> input('name');
        $lastName = $request -> input('lastName');
        $email = $request -> input('email');
        $phone = $request -> input('phone');
        $address = $request -> input('address');
        $comment = $request -> input('comment');
        $contacts -> name = $name;
        $contacts -> last_name = $lastName;
        $contacts -> email = $email;
        $contacts -> phone = $phone;
        $contacts -> address = $address;
        $contacts -> comment = $comment;
        $contacts -> save();

        MailController :: sendMail($name, $lastName, $email, $phone, $address, $comment);
        
        $data = array_merge(PageController :: getDefaultData($language, $page));

        return view('modules.contacts.step0', $data);
	}

}
