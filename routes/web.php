<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth/login');
})->name('/');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth/login');
})->name('login');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::get('/register', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth/register');
})->name('register');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);





Route::get('/email/verify/', function (Request $request) {

    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('home');
    }

    return view('auth.verify-email');

})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('home');
    }

    $request->fulfill();

    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Ссылка для подтверждения аккаунта была повторно отправлена!');
})->middleware('auth')->name('verification.send');






Route::view('/home', 'home')->middleware(['auth', 'verified'])->name('home');
Route::view('/profile', 'user/profile')->middleware(['auth', 'verified'])->name('profile');
Route::view('/edit-profile', 'user/edit-profile')->middleware(['auth', 'verified'])->name('edit-profile');
Route::post('/update-profile', [\App\Http\Controllers\UserController::class, 'updateProfile'])->name('update-profile');


Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('/'));
})->name('logout');