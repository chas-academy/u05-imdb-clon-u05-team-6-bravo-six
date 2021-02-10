<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    public function watchlist()
    {
        return $this->hasMany('\App\Models\WatchlistItem')->get();
    }
    use HasFactory;
}
