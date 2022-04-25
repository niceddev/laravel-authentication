<?php

namespace App\Services;

use App\Entities\UserEntity;
use App\Mail\RegisterMail;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthService
{
    public function register(Request $request)
    {
        $userEntity = new UserEntity(
            $request->getEntity()->getName(),
            $request->getEntity()->getEmail(),
            Hash::make($request->getEntity()->getPassword()),
        );

        $user = User::create($userEntity->toArray());

        if (!$user){
            return false;
        }

//        $user->notify(new WelcomeEmailNotification($userEntity));
//        Mail::to('as_lan1998@mail.ru')->send(new RegisterMail($userEntity));

        return true;
    }

    public function auth(array $credentials): bool
    {
        if (auth()->attempt($credentials)){
            return true;
        }

        return false;
    }
}
