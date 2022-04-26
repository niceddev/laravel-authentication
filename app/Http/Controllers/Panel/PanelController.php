<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $users = User::all();
        $notifications = auth()->user()->unreadNotifications;
        return view('layouts.panel', compact('users', 'notifications'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
