<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    public function likePost(Request $request)
    {
        $user = auth()->user();
        $postId = $request->input('id');
        $post = Post::find($postId);

        $existingLike = Like::where('post_id', $postId)
            ->where('user_id', $user->id)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            $isLiked = false;
        } else {
            $like = new Like();
            $like->post_id = $postId;
            $like->user_id = $user->id;
            $like->save();
            $isLiked = true;
        }
        

        $likeCount = Like::where('post_id', $postId)->count();

        return response()->json(['count' => $likeCount, 'isLiked' => $isLiked]);
    }

}
