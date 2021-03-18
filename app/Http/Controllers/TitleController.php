<?php

namespace App\Http\Controllers;

use App\Models\SecondaryGenre;
use App\Models\Title;
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


    public function searchTemp(Request $request)
    {

        // notes
        // to get this to work as best as possible, we need:
        /* 1. create column on secondary_genres that's called roughly 'role', set boolean?
            2. in seeding, lets make a few role-1 for each title. maybe a random amount?
            3. when displaying a title, in card or in .show, show all genre rels, but depending on role status, show special card or something idk

            maybe we can order the genre-relationships-instances in the search method BY ROLE ACCURACY! like, all instances that have role 1 first. WAIT



            we're outputting relationships. not object instances
            that doesn't work. we can't show duplicates?
            we need to find which unique title-ids are in the resulting genres collection and get those
            */

        // TEST
        $genres = $request->except('q', '_token'); //genre_ids
        $key = $request->get('q');
        $titles = Title::where('title', 'like', "%$key%")->get()->toArray();
        // dd($titles);
        $data = array_map(function ($i) use ($titles) {
            return $i['id'];
        }, $titles);

        $genres = SecondaryGenre::whereIn('title_id', $data)->whereIn('genre_id', $genres)->groupBy('title_id')->get();
        // $genres = SecondaryGenre::where('genre_id', [1, 2, 3])->groupBy('title_id')->get();
        dd($genres);
        // we send genres to the view, paginate. we actually pick out the title in the view itself, since paginate works best that way.
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
