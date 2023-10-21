<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $user = auth()->user();

        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return redirect()->route('post', ['id' => $request->post_id]);
    }

    public function replyComment(Request $request)
    {
        $user = auth()->user();

        $parent_id = $request->parent_comment_id;


        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
            'parent_comment_id' => $parent_id,
        ]);


        return redirect()->route('post', ['id' => $request->post_id]);
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return redirect()->back()->with('error', 'Комментарий не найден.');
        }

        if ($comment->user->id != auth()->user()->id) {
            return redirect()->back()->with('error', 'У вас нет прав для удаления этого комментария.');
        }

        // Проверяем, есть ли у комментария parent_comment_id
        if ($comment->parent_comment_id !== null) {
            // Это дочерний комментарий, и мы можем его удалить
            $comment->delete();
        } else {
            // Это главный комментарий, и мы удаляем его вместе с дочерними комментариями
            Comment::where('parent_comment_id', $comment->id)->delete();
            $comment->delete();
        }

        return redirect()->back();
    }




}
