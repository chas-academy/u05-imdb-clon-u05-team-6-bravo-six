<?php

namespace App\Http\Controllers\admin;

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
}
