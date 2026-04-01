<?php

use App\Http\Controllers\ActivityLogsController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\BadgesController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\EditUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactMessageController;

// public rute
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'pages.about-us')->name('about');
Route::view('/membership', 'pages.membership')->name('memberships.index');
Route::resource('/products', ProductController::class)->only(['index', 'show'])->names('products');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// samo za neulogovane korisnike
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
});

// samo za ulogovane korisnike
Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/user/edit/{user}', [EditUserController::class, 'edit'])->name('user.edit');
    Route::patch('/user/edit/{user}', [EditUserController::class, 'update'])->name('user.update');
});

// za member ulogu
Route::group(['middleware' => ['auth', 'role:member'], 'prefix' => 'member'], function() {

});

// za admin ulogu
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('messages', ContactMessageController::class)->only(['index', 'destroy', 'show', 'update'])->names('messages');
    Route::resource('products', AdminProductController::class)->except('show')->names('products');
    Route::patch('/ban/{user}', [UserController::class, 'toggleBan'])->name('users.ban');
    Route::resource('categories', CategoriesController::class)->except('show')->names('categories');
    Route::resource('brands', BrandController::class)->except('show')->names('brands');
    Route::resource('badges', BadgesController::class)->except('show')->names('badges');
    Route::resource('logs', ActivityLogsController::class)->only(['index', 'show'])->names('logs');
});
