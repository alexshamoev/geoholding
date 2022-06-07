<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordRecover;
use App\Mail\EmailVerification;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public static function passwordRecovery($emailData) {
        Mail::to($emailData['email'])->send(new PasswordRecover($emailData));
    }


    public static function emailVerification($emailData) {
        Mail::to($emailData['email'])->send(new EmailVerification($emailData));
    }
}
