<?php

namespace App\Http\Controllers;

use App\Models\SecondaryGenre;
use Illuminate\Http\Request;

class SecondaryGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('SecondaryGenre.index', ['SecondaryGenre' => SecondaryGenre::all()]);
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
     * @param  \App\Models\SecondaryGenre  $SecondaryGenre
     * @return \Illuminate\Http\Response
     */
    public function show(SecondaryGenre $SecondaryGenre)
    {
        //
        return view('SecondaryGenre.show', ['SecondaryGenre' => $SecondaryGenre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondaryGenre $SecondaryGenre
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondaryGenre $SecondaryGenre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecondaryGenre  $SecondaryGenre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondaryGenre $SecondaryGenre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondaryGenre  $SecondaryGenre
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondaryGenre $SecondaryGenre)
    {
        //
    }
}
