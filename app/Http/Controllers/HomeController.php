<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Post;

class HomeController extends Controller
{
    public function homeView()
    {
        $currentUser = auth()->user();
        $users = User::where('id', '!=', $currentUser->id)->get();

        $subscribedUsersId = $currentUser->subscriptions()->pluck('target_user_id');

        // Получаем посты, опубликованные этими пользователями
        $posts = Post::whereIn('user_id', $subscribedUsersId)->with('user')->orderBy('created_at', 'desc')->get();
        ;

        $subscribedUsers = User::whereIn('id', $subscribedUsersId)->get();

        return view('home', compact('users', 'subscribedUsers', 'posts'));
    }
}