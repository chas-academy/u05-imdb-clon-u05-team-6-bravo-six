<?php

namespace App\Http\Controllers;

use App\Models\WatchlistItem;
use Illuminate\Http\Request;

class WatchlistItemController extends Controller
{
    public function index()
    {
        return view('watchlistItems.index', ['watchlistitems' => WatchlistItem::all()]);
    }
}
