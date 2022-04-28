<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class PanelController extends Controller
{
    public function index()
    {
        $users = User::all();
        $notifications = auth()->user()->unreadNotifications;
        return view('dashboard', compact('users', 'notifications'));
    }

    public function markAsRead(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->where('id', $request->id)
            ->markAsRead();

        return response()->noContent();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
