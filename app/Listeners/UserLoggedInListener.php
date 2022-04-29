<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;

class UserLoggedInListener
{
    public function handle(UserLoggedIn $event)
    {
//        dd($event);
    }
}
