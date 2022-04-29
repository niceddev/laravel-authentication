<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::group(['prefix' => 'panel', 'middleware' => 'is_admin', 'as' => 'panel.'],function(){
   Route::get('/', [PanelController::class, 'index'])->name('index');
   Route::get('/products', [ProductController::class, 'index'])->name('products');
   Route::post('/mark-as-read', [PanelController::class, 'markAsRead']);
   Route::post('/logout', [PanelController::class, 'logout'])->name('logout');
});

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

