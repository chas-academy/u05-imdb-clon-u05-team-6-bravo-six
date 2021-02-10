<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function index()
    {
        return view('Watchlist.index', ['watchlists' => Watchlist::all()]);
    }
}
