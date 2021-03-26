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
        //$movies->avgRating = $movies->avgRating();

        //dd($movies);

        $topMovies = array(0, 0, 0);
        $mov1 = null;
        $mov2 = null;
        $mov3 = null;
        foreach ($movies as $movie) {
            $avgRating = $movie->avgRating();
            if ($topMovies[2] < $avgRating && $topMovies[1] < $avgRating && $topMovies[0] <= $avgRating) {
                
                if($topMovies[1] !== 0 && $topMovies[2] !== 0){
                    $topMovies[2] = $mov2->avgRating();
                    $topMovies[1] = $mov1->avgRating();
                    $mov3 = $mov2;
                    $mov2 = $mov1;
                    
                }elseif ($topMovies[1] !== 0){
                    $topMovies[1] = $mov1->avgRating();
                    $mov2 = $mov1;
                }
                $topMovies[0] = $avgRating;
                $mov1 = $movie;
            } elseif ($avgRating > $topMovies[2] && $avgRating >= $topMovies[1]) {
                
                if($topMovies[2] !== 0 && $topMovies[1] !== 0){
                    $topMovies[2] = $mov2->avgRating();
                    $mov3 = $mov2;
                    
                }
                $topMovies[1] = $avgRating;
                $mov2 = $movie;
            } elseif ($avgRating >= $topMovies[2]) {
                $topMovies[2] = $avgRating;
                $mov3 = $movie;
            }
        }



        $reviews = Review::withCount('commentsQuery')->get();
        $topReviews = $reviews->sortByDesc('comments_query_count')->take(5);

        $recentMovies = Title::orderBy('updated_at', 'desc')->take(3)->get();

        $randomMovies = [];
        for ($i = 0; $i < 3; $i++) {
            array_push($randomMovies, Title::inRandomOrder()->first());
        };
        return view('welcome', ['mov1' => $mov1, 'mov2' => $mov2, 'mov3' => $mov3, 'topReviews' => $topReviews, 'recentMovies' => $recentMovies, 'randomMovies' => $randomMovies]);
    }
}
