<?php

namespace App\Mail;

use App\Entities\UserEntity;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public function __construct(UserEntity $user)
    {
        $this->user = $user->toArray();
    }

    public function build()
    {
        $user = $this->user;
        return $this->view('mail.register', compact('user'));
    }
}
