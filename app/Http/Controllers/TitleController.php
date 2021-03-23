<?php

namespace App\Http\Controllers;

use App\Models\SecondaryGenre;
use App\Models\Title;
use App\Models\Review;
use Facade\FlareClient\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/search');
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

    //Used for search function on home page
    public function search(Request $request)
    {


        // the search function for getting a title based on query
        $key = trim($request->get('q'));
        $titles = Title::query()
            ->where('title', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get(); //paginate(10)->onBothSides(1);


        //get the recent 5 titles
        $recent_titles = Title::query()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('search', [
            'key' => $key,
            'titles' => $titles,
            'recent_titles' => $recent_titles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        
        // $avgRating = Review::query('reviews')
        // ->where('title_id', $title->id)
        // ->groupBy('title_id')
        // ->avg('rating');
        return view('titles.show', ['title' => $title, 'reviews' => collect($title->reviews())->sortByDesc('updated_at')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reviews(Title $title)
    {
        return view('titles.reviews', ['reviews' => $title->reviews(), 'title' => $title]);
    }
}
