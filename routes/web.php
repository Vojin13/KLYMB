<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::view('/about', 'pages.about-us')->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::view('/membership', 'pages.membership')->name('membership');
Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
