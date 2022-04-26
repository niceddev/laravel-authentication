<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\SendUserRegisteredNotification;
use Illuminate\Support\Facades\Notification;

class UserRegisteredListener
{
    public function handle($event)
    {
        $admins = User::whereIsAdmin(1)->get();
        Notification::send($admins, new SendUserRegisteredNotification($event->user));
    }
}
