<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Language;
use App\Mail\SendContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactsController extends FrontController {
    private const PAGE_SLUG = 'contact';
    private static $page;


    public function __construct() {
        parent::__construct();
        
        self::$page = Page::firstWhere('slug', self::PAGE_SLUG);
    }
    
    
    public static function getStep0($lang) {
        $language = Language::where('title', $lang)->first();
        
        return view('modules.contacts.step0', self::getDefaultData($language, self::$page));
    }


    public function sendMail(Request $request)
    {
        try {
            $form = [
                'fullname' => $request->input('fullname'),
                'company_name' => $request->input('company_name'),
                'email_address' => $request->input('email_address'),
                'phone_number' => $request->input('phone_number'),
                'message' => $request->input('message'),
            ];

            Mail::to('igogishvili47@gmail.com')->send(new SendContacts($form));
            return redirect()->back()->with('contact-success', __('bsw.contact-success'));

        } catch (\Throwable $th) {
            Log::error("message: ".$th->getMessage());
            return redirect()->back()->with('contact-error', __('bsw.contact-error'));
        }
    }
}