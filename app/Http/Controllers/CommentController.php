<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $review_id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'comment'   =>  'required|min:5|max:2000'
        ));

        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;
        $comment->body = $request->comment;
        $comment->review_id = $request->review_id;
        $comment->save();
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        if (!Gate::allows('handle-comment', $comment)) {
            return redirect()->back();
        } else {
            return view('comments.edit', ['comment' => $comment]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $review_id
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment) //$review_id
    {
        if (!Gate::allows('handle-comment', $comment)) {
            return redirect()->back();
        } else {
            $this->validate($request, array('comment' => 'required'));
            $comment->body = $request->comment;
            $comment->save();

            Session::flash('success', 'Comment updated');

            return redirect()->route('reviews.show', ['review' => $comment->review_id]);
        }
    }


    public function delete($comment)
    {
        if (!Gate::allows('handle-comment', $comment)) {
            return redirect()->back();
        } else {
            return view('comments.delete')->withComment($comment);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if (!Gate::allows('handle-comment', $comment)) {
            return redirect()->back();
        } else {
            $comment->delete();
            Session::flash('success', 'Deleted Comment');
            return redirect()->route('reviews.show', ['review' => $comment->review_id]);
        }
    }
}
