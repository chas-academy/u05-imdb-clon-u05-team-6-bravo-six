<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Review;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Title::all();
        
        $topMovies = array(0, 0, 0);
        $mov1 = null;
        $mov2 = null;
        $mov3 = null;
        foreach($movies as $movie){
            if( $topMovies[2] < $movie->avgRating() && $topMovies[1] < $movie->avgRating() && $topMovies[0] < $movie->avgRating()){
                $topMovies[0] = $movie->avgRating();
                $mov1=$movie;
            }elseif($movie->avgRating() > $topMovies[2] && $movie->avgRating() > $topMovies[1]){
                $topMovies[1] = $movie->avgRating();
                $mov2=$movie;
            }elseif($movie->avgRating() > $topMovies[2]){
                $topMovies[2] = $movie->avgRating();
                $mov3=$movie;
            }
        }
        
        $reviews = Review::withCount('commentsQuery')->get();
        $topReviews = $reviews->sortByDesc('comments_query_count')->take(5);
        
        
        
        
        return view('welcome' ,['mov1'=> $mov1, 'mov2'=> $mov2, 'mov3'=> $mov3, 'topReviews' => $topReviews]);
    }
}
