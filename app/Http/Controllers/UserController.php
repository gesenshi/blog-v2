<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class UserController extends Controller
{

    public function settingsView()
    {
        $posts = Post::all();

        return view('user/settings', compact('posts'));
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Zа-яА-ЯёЁ\s]+$/u'],
            'lastname' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[a-zA-Zа-яА-ЯёЁ\s]+$/u'],
            'bio' => ['nullable', 'string', 'max:300', 'min:20'],
            'currentPassword' => 'nullable|string|min:8',
            'newPassword' => 'nullable|string|min:8',
        ]);

        $user = auth()->user();
        $oldAvatar = $user->avatar;

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');

        if ($request->hasFile('avatar')) {
            if ($oldAvatar && $oldAvatar !== 'default.jpg') {
                $oldAvatarPath = public_path($oldAvatar);
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatars'), $avatarName);
            $user->avatar = 'avatars/' . $avatarName;
        }


        $newPassword = $request->input('newPassword');

        if (!empty($newPassword)) {
            if (Hash::check($request->input('currentPassword'), $user->password)) {
                $user->password = Hash::make($newPassword);
            } else {
                return redirect()->route('settings')->withErrors('Текущий пароль неверен');
            }
        }

        $user->save();

        return redirect()->route('settings')->with('success', 'Профиль успешно обновлен');
    }
}