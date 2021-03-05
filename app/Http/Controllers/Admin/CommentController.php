<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(User $user)
    {
        $sort = (request()->get('sort')) ? request()->get('sort') : 'updated_at';
        $comments = Comment::orderBy($sort)->paginate(25);
        if ($sort === 'updated_at' || $sort === 'created_at') {
            $comments = Comment::orderByDesc($sort)->paginate(25);
        };

        // $comments = $comments->paginate(25);
        return view('admin.comments.index', ['comments' => $comments, 'sort' => $sort, 'user' => $user]);
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
