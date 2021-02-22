<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchlistItem extends Model
{
    public function watchlist()
    {
        return $this->belongsTo('\App\Models\Watchlist')->first();
    }
    public function title()
    {
        return $this->belongsTo('\App\Models\Title')->first();
    }
    use HasFactory;
}
