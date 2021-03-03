<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Watchlist;
use App\Models\WatchlistItem;

class WatchlistItemController extends Controller
{
    public function index($watchlistItem){

    }
    public function destroy(WatchlistItem $watchlistitem)
    {
        $watchlistitem->delete();
        return redirect()->back();
    }
}
