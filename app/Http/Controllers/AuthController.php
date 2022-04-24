<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(AuthRequest $request, AuthService $authService)
    {
        $credentials = $request->validated();
        if ($authService->auth($credentials)){
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors('Wrong password or email');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
