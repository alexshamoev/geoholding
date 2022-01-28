<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $lastName;
    public $email;
    public $phone;
    public $address;
    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($name, $lastName, $email, $phone, $address, $comment)
    {
        $this -> name = $name;
        $this -> lastName = $lastName;
        $this -> email = $email;
        $this -> phone = $phone;
        $this -> address = $address;
        $this -> comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.contactForm');
    }
}
