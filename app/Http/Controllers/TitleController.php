<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Facade\FlareClient\View;
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
        $key = trim($request->get('q'));

        $titles = Title::query()
            ->where('title', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();


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
