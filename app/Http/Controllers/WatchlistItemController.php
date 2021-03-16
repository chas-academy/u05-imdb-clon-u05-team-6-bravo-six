<?php

namespace App\Http\Controllers;

use App\Models\WatchlistItem;
use Illuminate\Http\Request;

class WatchlistItemController extends Controller
{
    public function index()
    {
        return view('watchlistItems.index', ['watchlistItems' => WatchlistItem::all()]);
    }
    public function destroy(WatchlistItem $watchlistItem)
    {
        $watchlistItem->delete();
        return redirect()->back();
    }
}
