<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class PostController extends Controller
{

    public function create()
    {
        $categories = Category::all();

        return view('post/create-post', compact('categories'));
    }

    public function postView($id)
    {
        $post = Post::find($id);

        $posts = Post::all();

        if (!$post) {

            return abort(404);
        }

        $user = User::find($post->user_id);

        $authorPosts = Post::where('user_id', $user->id)->get();

        $comments = $post->comments()
            ->where('parent_comment_id', null) // Выбираем только родительские комментарии
            ->orderBy('created_at', 'desc')
            ->get();
        // Создаем пустой массив для хранения дочерних комментариев
        $childComments = [];

        // Перебираем родительские комментарии и для каждого из них получаем дочерние комментарии
        foreach ($comments as $parentComment) {
            $childComment = Comment::where('parent_comment_id', $parentComment->id)
                ->whereNotNull('parent_comment_id')
                ->orderBy('created_at', 'desc')
                ->get();

            $childComments[$parentComment->id] = $childComment;
        }

        $commentsCount = Comment::where('post_id', $id)->count();

        $likesCount = Like::where('post_id', $id)->count();

        return view('post/post', compact('post', 'authorPosts', 'user', 'comments', 'likesCount', 'commentsCount', 'childComments'));
    }


    public function addPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'cover-image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('cover-image')) {
            $image = $request->file('cover-image');
            $imageData = file_get_contents($image->getRealPath());
        } else {
            $imageData = null;
        }

        $userId = Auth::id();

        $post = new Post([
            'name' => $validatedData['name'],
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'category_id' => $validatedData['category_id'],
            'cover_image' => $imageData,
            'user_id' => $userId,
        ]);

        $post->save();

        return redirect()->route('user.profile');
    }
}