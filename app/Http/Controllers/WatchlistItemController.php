<?php

namespace App\Http\Controllers;

use App\Models\WatchlistItem;
use Illuminate\Http\Request;

class WatchlistItemController extends Controller
{
    public function destroy(WatchlistItem $watchlistItem)
    {
        if ($watchlistItem->watchlist()->user()->id !== Auth::id()) {
            return redirect()->back();
        };
        $watchlistItem->delete();
        return redirect()->back();
    }
}
