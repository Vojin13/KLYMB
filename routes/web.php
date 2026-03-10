<?php

use App\Http\Controllers\admin\ContactMessageController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::view('/about', 'pages.about-us')->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::view('/membership', 'pages.membership')->name('membership');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register')->middleware('guest');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/messages', [ContactMessageController::class, 'index'])->name('admin.messages');
});
