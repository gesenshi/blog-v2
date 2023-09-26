<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\SecurePassword;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $request->validate([
            'firstname' => 'required|string|regex:/^[a-zA-Zа-яА-ЯёЁ\s]+$/u',
            'lastname' => 'required|string|regex:/^[a-zA-Zа-яА-ЯёЁ\s]+$/u',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'min:8', new SecurePassword],
        ]);

        // Создание нового пользователя
        $user = new User([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $formFields = $request->only('email', 'password');

        if (Auth::attempt($formFields)) {
            return redirect()->route('home');
        }

        return redirect(route('login'))->withErrors(['error' => 'Неверный логин или пароль']);
    }
}