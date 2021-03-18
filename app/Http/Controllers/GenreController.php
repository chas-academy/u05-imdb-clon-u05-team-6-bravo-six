<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('genres.index', ['genres' => Genre::all()]);
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
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //'/genres/4
        // if there is a q-key, do search and populate titles
        if (request('q')) {


            //     // i made a solution for searching through pivot table!

            //     $key = $request->get('q');
            //     $genreIds = [1];
            //     $titles = Title::where('title', 'like', "%$key%")->get()->toArray();
            //     // dd($titles);
            //     $data = array_map(function ($i) use ($titles) {
            //         return $i['id'];
            //     }, $titles);
            //     // dd($data);
            //     $genres = SecondaryGenre::whereIn('title_id', $data)->whereIn('genre_id', $genreIds)->paginate(10);
            //     // $genres = SecondaryGenre::where('genre_id', [1, 2, 3])->groupBy('title_id')->get();
            //     dd($genres);
            //     // you can loop through genres and get their title easy.


            // one solution to this is{
            // rebuild database to let all genre relationships be represented in one relationship.
            // maybe add column to pivot table that has the 'role' associated with the genre - e.g. primary or secondary.

            // }

            // next solution {
            // show a static result of all main movies. maybe link to a specific page for it? 
            // show a paginated result of all movies that have it secondarily
            // }

            $key = request('q');
            $titlesSub = $genre->titlesSecondary()->where('title', 'like', "%$key%")->get();
            $titlesMain = $genre->hasMany(\App\Models\Title::class)->where('title', 'like', "%$key%")->get();
            $titles = (collect($titlesSub->merge($titlesMain)));
            // ->paginate(10)->onEachSide(1);
            //             ->paginate(10)->onEachSide(1);
            // propagate this titles collection with one from secondaries somehow
        } else {
            $titles = $genre->titlesSecondary()->paginate(10)->onEachSide(1);
        }
        return view('genres.show', ['genre' => $genre, 'titles' => $titles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
