<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WatchlistItemController extends Controller
{
    public function index($watchlistItem){

    }
    public function destroy(WatchlistItem $watchlistItem)
    {
        $watchlistItem->delete();
        return redirect()->action([WatchlistItemController::class, 'index']);
    }
}
