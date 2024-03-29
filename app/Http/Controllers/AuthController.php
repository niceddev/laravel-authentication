<?php

namespace App\Http\Controllers;

use App\Events\UserLoggedIn;
use App\Events\UserRegistered;
use App\Http\Requests\AuthRequest;
use App\Services\AuthService;

class AuthController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store(AuthRequest $request)
    {
        $credentials = $request->validated();
        if ($this->authService->auth($credentials)){
            UserLoggedIn::dispatch(auth()->user());

            return redirect()->route('home');
        }

        return redirect()->back()->withErrors('Wrong password or email');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
