<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
//        $products = Product::all()->load('cities');
        $products = Product::with('cities')->get();
        return view('panel.dashboard', compact('users', 'notifications', 'products'));
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
