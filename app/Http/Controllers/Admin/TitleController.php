<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\SecondaryGenre;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TitleController extends Controller
{
    //
    public function index()
    {
        return view('admin.titles.index', ['titles' => Title::paginate(25)]);
    }
    public function show(Title $title)
    {
        return view('admin.titles.show', ['title' => $title]);
    }
    public function create()
    {
        return view('admin.titles.create', ['genres' => Genre::all()]);
    }
    public function store(Request $request)
    {
        $title = new Title;
        $title->title = $request->title;
        $title->user_id = Auth::user()->id;
        $title->genre_id = $request->genre_id;
        $title->save();
        foreach ($request->except('title', 'genre_id', '_token', '_method') as $key => $value) {
            $secondary_genre = new SecondaryGenre;
            $secondary_genre->name = Genre::where('id', $key)->first()->name;
            $secondary_genre->title_id = $title->id;
            $secondary_genre->genre_id = $key;
            $secondary_genre->save();
        }
        return redirect()->action([TitleController::class, 'index']);
    }
    public function update(Request $request, Title $title)
    {
        $title->title = $request->title;
        $title->genre_id = $request->genre_id;
        $title->save();
        return redirect()->back();
    }
    public function reviews(Title $title)
    {
        return view('admin.titles.reviews', ['reviews' => $title->reviews(), 'title' => $title]);
    }
    public function secondary_genres(Title $title)
    {
        return view('admin.titles.secondary_genres', ['all' => Genre::all(), 'genres' => $title->secondary_genre_relationships(), 'title' => $title]);
    }
    public function update_genres(Request $request, Title $title)
    {
        $data = $request->except(['_token', '_method']);
        $haystack = $title->secondary_genre_relationships();
        // dd($haystack);
        foreach ($data as $key => $value) {
            if ($haystack->where('genre_id', intval($key))->count() === 0) {
                $genre = new SecondaryGenre;
                $genre->name = Genre::find(intval($key))->name;
                $genre->title_id = $title->id;
                $genre->genre_id = intval($key);
                $genre->save();
            }
        };
        foreach ($haystack as $genre) {
            if (!array_key_exists($genre->genre_id, $data)) {
                $genre->delete();
            };
        };
        return redirect()->back();
    }
}
