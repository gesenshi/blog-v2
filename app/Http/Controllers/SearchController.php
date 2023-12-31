<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Jenssegers\Date\Date;

class SearchController extends Controller
{
    public function searchView()
    {

        return view('search/search');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $text_input = $request->input('query');
            $users = User::where(function ($query) use ($text_input) {
                $query->where('firstname', 'like', "%{$text_input}%")
                    ->orWhere('lastname', 'like', "%{$text_input}%");
            })->get();

            $posts = Post::where('name', 'like', "%{$text_input}%")
                ->orWhere('content', 'like', "%{$text_input}%")
                ->orWhere('tags', 'like', "%{$text_input}%")
                ->get();

            $outputUsers = '';
            $outputPosts = '';

            if (count($users) > 0) {
                foreach ($users as $user) {
                    $avatar = asset($user->avatar ?: 'avatars/default.jpg');
                    $outputUsers .= '
                    <div class="hover:dark:bg-slate-500 flex items-center gap-6 bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400 hover:bg-opacity-[0.9]">
                        <a href="/profile/' . $user->id . '"><img style="object-fit: cover;" class="inline-block h-[3.875rem] w-[3.875rem] rounded-full ring-2 ring-white dark:ring-gray-800"
                            src="' . $avatar . '" alt="' . $user->firstname . ' ' . $user->lastname . '"></a>
                        <div class="flex flex-col gap-2">
                            <a href="/profile/' . $user->id . '"><p class="font-bold dark:text-white">' . $user->firstname . ' ' . $user->lastname . '</p></a>
                            <div class="flex gap-4">
                                <a href="/profile/' . $user->id . '">Перейти в профиль</a>
                            </div>
                        </div>
                    </div>
                ';
                }
            }

            if (count($posts) > 0) {
                foreach ($posts as $post) {
                    $outputPosts .= '
                    <a href="/post/ ' . $post->id . '">
                    <div class="flex items-center gap-6 bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400 hover:bg-opacity-[0.9] hover:bg-gray-600">                        
                        <div class="flex flex-col gap-2">
                           <p class="font-bold">' . $post->name . '</p>
                           <div class="flex gap-4">
                            ' . $post->title . '
                           </div>
                           <div>
                           ' . Date::parse($post->created_at)->format('j F Y') . '</div>
                        </div>
                    </div></a>
                ';
                }
            }

            return response()->json(['users' => $outputUsers, 'posts' => $outputPosts]);
        }
    }

}

