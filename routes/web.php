<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth/login');
})->name('/');

Route::get('/logout', function () {

});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth/login');
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth/register');
})->name('register');

Route::view('/home', 'home')->middleware('auth')->name('home');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('/'));
});