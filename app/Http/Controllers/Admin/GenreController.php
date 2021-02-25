<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $sort = (request()->get('sort')) ? request()->get('sort') : 'id';
        $genres = Genre::orderBy($sort)->paginate(25);
        return view('admin.genres.index', ['genres' => $genres, 'sort' => $sort]);
        // return view('admin.genres.index', ['genres' => Genre::all()]);
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
        return view('admin.genres.show', ['genre' => $genre]);
        // $titles = $genre->titlesSecondary();
        // return view('admin.genres.show', ['genre' => $genre, 'titles' => $titles]);
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
        $genre->name = $request->name;
        $genre->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect(action([GenreController::class, 'index']));
    }
}