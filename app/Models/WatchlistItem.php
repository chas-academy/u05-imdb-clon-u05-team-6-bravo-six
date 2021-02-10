<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchlistItem extends Model
{
    public function WatchlistItem()
    {
        return $this->belongsTo('\App\Models\Watchlist')->first();
    }
    use HasFactory;
}
