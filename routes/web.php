<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
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






Route::get('/home', [\App\Http\Controllers\HomeController::class, 'homeView'])->middleware(['auth', 'verified'])->name('home');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'ProfileView'])
    ->middleware(['auth', 'verified'])
    ->name('user.profile'); // Уникальное имя для просмотра собственного профиля

Route::get('/profile/{id}', [\App\Http\Controllers\ProfileController::class, 'publicProfileView'])
    ->name('public.profile'); // Уникальное имя для просмотра публичных профилей

/* Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('users.search'); */
Route::get('/search/query', [\App\Http\Controllers\SearchController::class, 'query'])->name('search');

// Маршруты для подписок
Route::post('/subscribe/{user}', [\App\Http\Controllers\SubscribeController::class, 'subscribe'])->name('subscribe');
Route::post('/unsubscribe/{user}', [\App\Http\Controllers\SubscribeController::class, 'unsubscribe'])->name('unsubscribe');

// Маршруты для поиска
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'searchView'])->name('search');

Route::post('/search-result', [\App\Http\Controllers\SearchController::class, 'search'])->name('search-result');



Route::get('/settings', [\App\Http\Controllers\UserController::class, 'settingsView'])->middleware(['auth', 'verified'])->name('settings');

Route::post('/update-profile', [\App\Http\Controllers\UserController::class, 'updateProfile'])->name('update-profile');

Route::get('/create-post', [\App\Http\Controllers\PostController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('create-post');


Route::get('/post/{id}', [\App\Http\Controllers\PostController::class, 'postView'])
    ->middleware(['auth', 'verified'])
    ->name('post');


Route::post('/add-post', [\App\Http\Controllers\PostController::class, 'addPost'])->middleware(['auth', 'verified'])->name('add-post');

Route::post('/like-post', [\App\Http\Controllers\LikeController::class, 'likePost'])->name('like-post');
Route::post('/unlike-post/{id}', [\App\Http\Controllers\LikeController::class, 'unlikePost'])->name('unlike-post');

Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'addComment'])->name('comments.add');

Route::post('/comments/reply', [\App\Http\Controllers\CommentController::class, 'replyComment'])->name('comments.reply');


Route::get('/delete-comment/{id}', [\App\Http\Controllers\CommentController::class, 'deleteComment'])->name('comments.delete');



Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('/'));
})->name('logout');