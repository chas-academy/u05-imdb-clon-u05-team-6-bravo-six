<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $sort = (request()->get('sort')) ? request()->get('sort') : 'id';
        $reviews = Review::orderBy($sort)->paginate(25);
        return view('admin.reviews.index', ['reviews' => $reviews, 'sort' => $sort, 'user' => $user]);
        // return view('admin.reviews.index', ['reviews' => Review::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('admin.reviews.show', ['review' => $review]);
        //
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
        $review->title = $request->title;
        $review->body = $request->body;
        $review->save();
        return redirect()->back();
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
        return redirect(action([ReviewController::class, 'index']));
    }
}
