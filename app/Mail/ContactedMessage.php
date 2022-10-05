<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactedMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $email;

    public function __construct($email,$message)
    {
        $this->email = $email;
        $this->message = $message;

    }

    public function build()
    {
        return $this->markdown('mail.contacted-message');
    }
}
