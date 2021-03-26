<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Title::all();
        
        foreach ($movies as $movie) {
        $movie->avgRating = $movie->avgRating();
        }
        
        $topMovies = $movies->sortByDesc('avgRating')->take(3);
        

        $reviews = Review::withCount('commentsQuery')->get();
        $topReviews = $reviews->sortByDesc('comments_query_count')->take(5);

        $recentMovies = Title::orderBy('updated_at', 'desc')->take(3)->get();

        $randomMovies = [];
        for ($i = 0; $i < 3; $i++) {
            array_push($randomMovies, Title::inRandomOrder()->first());
        };
        return view('welcome', ['topMovies' => $topMovies, 'topReviews' => $topReviews, 'recentMovies' => $recentMovies, 'randomMovies' => $randomMovies]);
    }
}
