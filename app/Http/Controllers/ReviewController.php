<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Title;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reviews.index', ['reviews' => Review::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return a view for creating a review (review.create)
        return view('review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //, Title $title
    {
        // $this->validate($request, array()),[
        $title_id = $request->title_id;
        $review = new Review;
        $review->rating = $request->rating;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->title_id = $title_id;
        $review->user_id = Auth::user()->id;
        $review->save();
        return redirect()->action([ReviewController::class, 'show'], ['review' => $review->id]);
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.show', ['review' => $review]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        if (Auth::id()  !== $review->user_id) {
            return redirect()->back();
        } else {
            return view('reviews.edit', ['review' => $review]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Review $review)
    {

        // $title_id = $request->title_id;
        // $review = new Review;
        // $review->rating = $request->rating;
        // $review->title = $request->title;
        // $review->body = $request->body;
        // $review->title_id = $title_id;
        // $review->user_id = Auth::user()->id;
        // $review->save();
        // return redirect()->action([ReviewController::class, 'show'], ['review' => $review->id]);



        $this->validate($request, array('review' => 'required'));
        $review->body = $request->review;
        $review->save();

        Session::flash('success', 'Review updated');

        return redirect()->route('reviews.show', ['review' => $review->review_id]);
    }

    public function delete($review)
    {
        if (Auth::id()  !== $review->user_id) {
            return redirect()->back();
        } else {
            return view('reviews.delete')->withReview($review);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        Session::flash('success', 'Review removed!');
        return redirect()->route('reviews.show', ['review' => $review->review_id]);
    }
}
