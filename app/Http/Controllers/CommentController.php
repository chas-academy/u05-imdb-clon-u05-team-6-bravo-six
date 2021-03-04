<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Review;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('comments.index', ['comments' => Comment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

        // $review = Post::find($review_id);

        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;
        $comment->body = $request->comment;
        $comment->review_id = $request->review_id;
        $comment->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        if (Auth::id()  !== $comment->user_id){
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
        $this->validate($request, array('comment' => 'required'));
        $comment->body = $request->comment;
        $comment->save();

        Session::flash('success', 'Comment updated');

        return redirect()->route('reviews.show', ['review' => $comment->review_id]);
    }


    public function delete($comment)
    {
        if (Auth::id()  !== $comment->user_id){
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
        $comment->delete();
        Session::flash('success', 'Deleted Comment');
        return redirect()->route('reviews.show', ['review' => $comment->review_id]);
    }
}
