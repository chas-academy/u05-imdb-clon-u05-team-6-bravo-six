<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderByDesc('updated_at')->paginate(25);
        // $comments = $comments->paginate(25);
        return view('admin.comments.index', ['comments' => $comments]);
    }
    public function show(Comment $comment)
    {
        return view('admin.comments.show', ['comment' => $comment]);
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect(action([CommentController::class, 'index']));
    }
    public function update(Request $request, Comment $comment)
    {
        $comment->body = $request->body;
        $comment->save();
        return redirect()->back();
    }
}
