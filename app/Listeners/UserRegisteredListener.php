<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\User;
use App\Notifications\SendUserRegisteredNotification;
use Illuminate\Support\Facades\Notification;

class UserRegisteredListener
{
    public function handle(UserRegistered $event)
    {
        $admins = User::whereIsAdmin(1)->get();
        Notification::send($admins, new SendUserRegisteredNotification($event->user));
    }
}
