<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;

    public function __construct($user)
    {
       $this->user = $user;
    }

    public function build()
    {
        return $this->view('email.email')->with([
            'email_token' => $this->user->email_token,
        ])->subject("Email Verification");
        // return $this->view('view.name');
    }
}
