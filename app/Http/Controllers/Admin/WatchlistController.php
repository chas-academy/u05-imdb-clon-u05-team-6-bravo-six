<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Watchlist;
use App\Models\WatchlistItem;

class WatchlistController extends Controller
{
    public function index()
    {
        $sort = (request()->get('sort')) ? request()->get('sort') : 'id';
        $watchlists = Watchlist::orderBy($sort)->paginate(25);
        return view('admin.watchlists.index', ['watchlists' => $watchlists, 'sort' => $sort]);
    }
    public function show(Watchlist $watchlist)
    {
        return view('admin.watchlists.show', ['watchlist' => $watchlist]);
    }
    public function destroy(Watchlist $watchlist)
    {
        $watchlist->delete();
        return redirect()->action([WatchlistController::class, 'index']);
    }
    public function update(Request $request, Watchlist $watchlist)
    {
        $watchlist->name = $request->name;
        
        $watchlist->save();
        return redirect()->action([WatchlistController::class, 'index']);
    }
    public function create()
    {
        return view('admin.watchlists.create');
    }
    public function store(Request $request)
    {
        $watchlist = new Watchlist;
        $watchlist->name = $request->name;
        $watchlist->user_id = $request->user_id;
        $watchlist->save();
        return redirect()->action([WatchlistController::class, 'index']);
    }
    
}
