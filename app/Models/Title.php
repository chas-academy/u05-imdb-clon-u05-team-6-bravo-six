<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public function secondary_genre_relationships()
    {
        return $this->hasMany('\App\Models\SecondaryGenre')->get();
    }

    public function genre()
    {
        return $this->belongsTo('\App\Models\Genre')->first();
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User')->first();
    }
    public function reviews()
    {
        return $this->hasMany('\App\Models\Review')->get();
    }
    use HasFactory;
}
