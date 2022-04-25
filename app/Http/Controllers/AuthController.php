<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

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
