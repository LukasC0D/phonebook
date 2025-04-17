<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\PhonebookController;

Route::get('/register', [WebAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [WebAuthController::class, 'register']);

Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);

Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('phonebook', PhonebookController::class);
    Route::post('/phonebook/{phonebook}/share', [PhonebookController::class, 'share'])->name('phonebook.share');
    Route::post('/phonebook/{phonebook}/unshare', [PhonebookController::class, 'unshare'])->name('phonebook.unshare');
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');
    Route::get('/about', function () {
        return view('about');
    })->name('about');;
});
