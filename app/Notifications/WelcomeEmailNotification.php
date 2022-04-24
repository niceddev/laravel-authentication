<?php

namespace App\Notifications;

use App\Entities\UserEntity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmailNotification extends Notification
{
    use Queueable;

    private $userEntity;

    public function __construct(UserEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Successfully registered!')
                    ->action('Go to home page', env('APP_URL'))
                    ->line('Thank you for using our application!')
                    ->line($this->userEntity->getEmail());
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
