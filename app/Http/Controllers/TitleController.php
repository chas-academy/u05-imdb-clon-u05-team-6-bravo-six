<?php

namespace App\Http\Controllers;

use App\Models\Title;
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
        return redirect('/search');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        return view('titles.show', ['title' => $title, 'reviews' => collect($title->reviews())->sortByDesc('updated_at')]);
    }
}
