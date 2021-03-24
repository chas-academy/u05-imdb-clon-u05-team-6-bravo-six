<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\WatchlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        $sort = (request()->get('sort')) ? request()->get('sort') : 'id';
        $watchlists = Watchlist::orderBy($sort)->paginate(25);
        return view('watchlists.index', ['watchlists' => $watchlists, 'sort' => $sort]);
    }

    public function show(Watchlist $watchlist)
    {
        return view('watchlists.show', ['watchlist' => $watchlist, 'watchlistItems' => $watchlist->watchlistItems()]);
        //
    }
    //Used for search function on watchlist page
    public function search(Request $request)
    {


        // the search function for getting a title based on query
        $key = trim($request->get('q'));
        $watchlists = Watchlist::query()
            ->where('name', 'like', "%{$key}%")
            ->orderBy('created_at',)
            ->get(); //paginate(10)->onBothSides(1);

        return view('watchlists.search', [
            'key' => $key,
            'watchlists' => $watchlists,
        ]);
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
    public function add_title_to_watchlist(Watchlist $watchlist, \App\Models\Title $title)
    {
        if ($watchlist->watchlistItems()->contains('title_id', $title->id)) {
            $watchlist->watchlistItems()->toQuery()->where('title_id', $title->id)->delete();
            return json_encode(['status' => 205]);
        }
        $title_id = $title->id;
        $watchlist_id = $watchlist->id;
        $watchlistItem = new WatchlistItem;
        $watchlistItem->title_id = $title_id;
        $watchlistItem->watchlist_id = $watchlist_id;
        $watchlistItem->save();
        return json_encode(['status' => 203]);
    }
}
