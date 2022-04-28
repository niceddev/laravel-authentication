<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class RegisterController
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request, AuthService $authService)
    {
        if ($authService->register($request)){
            $authService->auth($request->safe()->except('name'));
            UserRegistered::dispatch(auth()->user());

            return redirect()->route('home');
        }

        return redirect()->back()->withErrors('Wrong password or email');
    }
}
