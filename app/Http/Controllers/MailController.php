<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public static function sendMail($name, $lastName, $email, $phone, $address, $comment) {
        Mail :: to('lashalashka61@gmail.com') -> send(new ContactForm($name, $lastName, $email, $phone, $address, $comment));
    }
}
