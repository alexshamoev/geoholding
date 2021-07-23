<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    
    private $email;
    private $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $password)
    {
        $this -> email = $email;
        $this -> password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this -> markdown('emails.welcome', ['email' => $this -> email,
                                                    'password' => $this -> password]);
    }
}
