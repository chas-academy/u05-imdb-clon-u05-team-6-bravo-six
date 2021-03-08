<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        return view('watchlists.index', ['watchlists' => Watchlist::all()]);
    }

    public function show(Watchlist $watchlist)
    {
        return view('watchlists.show', ['watchlist' => $watchlist, 'watchlistItems' => $watchlist->watchlistItems()]);
        //
    }
    public function create()
    {
        //return a view for creating a review (review.create)
        return view('watchlist.create');
    }
    public function store(Request $request) //, Title $title
    {
        // $this->validate($request, array()),[
        $user_id = $request->user_id;
        $newWatchlist = new Watchlist;
        $newWatchlist->name = $request->name;
        if ($request->public) {
            $newWatchlist->public = true;
        } else {
            $newWatchlist->public = false;
        }
        $newWatchlist->user_id = Auth::user()->id;
        $newWatchlist->save();
        return redirect()->action([WatchlistController::class, 'show'], ['watchlist' => $newWatchlist->id]);
        // ]);
    }
}
