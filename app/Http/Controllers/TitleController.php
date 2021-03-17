<?php

namespace App\Http\Controllers;

use App\Models\SecondaryGenre;
use App\Models\Title;
use Facade\FlareClient\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('titles.index', ['titles' => Title::all()]);
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
            ->paginate(5);


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

    public function searchByGenre(Request $request)
    {
        // aggregate all of the checkboxes checked into an array
        // $genre_ids = $request->except(['_token', 'q']);
        // $data = [];
        // foreach ($genre_ids as $key => $value) {
        //     array_push($data, $key);
        // };
        // $secondaryGenreRels = SecondaryGenre::where('genre_id', $data[0]);
        // foreach ($data as $value) {
        //     $secondaryGenreRels->orWhere('genre_id', $value);
        // };
        // dd($secondaryGenreRels->get());
        // $key = trim($request->get('q'));
        // $titles = Title::query()->where('title', 'like', "%{$key}%")->genres();



        // use the array to format a query, based on secondary_genre_relationships()
        // chain that query on the regular search-function


        // request has genre_id and query
        // do regular search and limit results by genre_id?
        // alternatively, sort in client?
        // most likely not




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
