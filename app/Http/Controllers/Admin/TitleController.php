<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Review;
use App\Models\SecondaryGenre;
use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TitleController extends Controller
{
    //
    public function index(User $user)
    {
        $sort = request()->get('sort') ? request()->get('sort') : 'created_at';
        $titles = Title::orderByDesc($sort)->paginate(25);
        if ($sort === 'title' || $sort === 'id') {
            $titles = Title::orderBy($sort)->paginate(25);
        };
        return view('admin.titles.index', ['titles' => $titles, 'sort' => $sort, 'user' => $user]);
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
        $title->description = $request->description;
        $title->user_id = Auth::user()->id;
        $title->genre_id = $request->genre_id;
        $title->img_url = $request->src;
        $title->save();
        foreach ($request->except('title', 'genre_id', '_token', '_method', 'description', 'src') as $key => $value) {
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
        $title->img_url = $request->src ? $request->src : $title->img_url;
        $title->save();
        return redirect()->back();
    }
    public function reviews(Title $title)
    {
        $sort = request('sort') ? request('sort') : 'updated_at';
        $reviews = Review::where('title_id', $title->id)->orderByDesc($sort)->paginate(25);
        if ($sort === 'title' || $sort === 'id') {
            $reviews = Review::where('title_id', $title->id)->orderBy($sort)->paginate(25);
        };
        return view('admin.titles.reviews', ['reviews' => $reviews, 'title' => $title]);
    }
    public function secondary_genres(Title $title)
    {
        return view('admin.titles.secondary_genres', ['all' => Genre::all(), 'genres' => $title->secondary_genre_relationships(), 'title' => $title]);
    }
    public function destroy(Title $title)
    {
        $title->delete();
        return redirect()->action([TitleController::class, 'index']);
    }
    public function update_genres(Request $request, Title $title)
    { 
        $data = $request->except(['_token', '_method']);
        $haystack = $title->secondary_genre_relationships();
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
