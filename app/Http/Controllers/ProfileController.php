<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Subscription;


class ProfileController extends Controller
{
    public function profileView()
    {
        $user = auth()->user();

        $posts = Post::where('user_id', $user->id)->get();

        $followers = Subscription::where('target_user_id', $user->id)->get();

        $followings = Subscription::where('user_id', $user->id)->get();

        return view('user/profile', compact('posts', 'followers', 'followings'));
    }

    public function publicProfileView($id)
    {
        $publicUser = User::find($id);

        if (!$publicUser) {
            abort(404);
        }

        $followers = Subscription::where('target_user_id', $publicUser->id)->get();

        $followings = Subscription::where('user_id', $id)->get();

        $currentUser = auth()->user();

        if ($id == $currentUser->id) {
            return redirect()->route('user.profile');
        }

        $posts = Post::where('user_id', $publicUser->id)->get();

        return view('user/public-profile', compact('publicUser', 'posts', 'followers', 'followings'));

    }

}