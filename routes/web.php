<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'main')->name('main');
Route::middleware('auth')->group(function (){
    Route::view('/home', 'home')->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware('guest')->group(function () {
    Route::name('register.')->group(function () {
        Route::get('/register', [RegisterController::class, 'create'])->name('form');
        Route::post('/register', [RegisterController::class, 'store'])->name('store');
    });
    Route::name('auth.')->group(function () {
        Route::get('/login', [AuthController::class, 'create'])->name('form');
        Route::post('/login', [AuthController::class, 'store'])->name('store');
    });
});

