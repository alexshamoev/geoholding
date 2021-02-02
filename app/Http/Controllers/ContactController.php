<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller {
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
}
