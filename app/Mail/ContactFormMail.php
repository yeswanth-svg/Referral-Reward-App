<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $message; // This should be a string from the form

    public function __construct($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message; // Ensure this is a string
    }

    public function setBody($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->text = $subject;
        $this->html = $message; 
    }

    public function build()
    {
        return $this->from($this->email, $this->name)
            ->subject($this->subject)
            ->view('emails.contact');
    }
}
