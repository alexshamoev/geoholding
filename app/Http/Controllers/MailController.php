<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordRecover;
use App\Mail\EmailVerification;
use App\Mail\Order;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public static function passwordRecovery($emailData) {
        Mail::to($emailData['email'])->send(new PasswordRecover($emailData));
    }


    public static function emailVerification($emailData) {
        Mail::to($emailData['email'])->send(new EmailVerification($emailData));
    }


    public static function orderEmail($emailData) {
        Mail::to('lashalashka61@gmail.com')->send(new Order($emailData));
    }
}
