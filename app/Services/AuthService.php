<?php

namespace App\Services;

use App\Entities\UserEntity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(Request $request): bool
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
