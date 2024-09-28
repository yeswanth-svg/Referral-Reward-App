<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreditPointsAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $credits;
    public $projectType;

    public function __construct($user, $credits, $projectType)
    {
        $this->user = $user;
        $this->credits = $credits;
        $this->projectType = $projectType;
    }

    public function build()
    {
        return $this->subject('Credit Points Earned!')
            ->view('emails.credit_points_added'); // Create this view
    }
}
