<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public function genre()
    {
        return $this->belongsTo('\App\Models\Genre')->first();
    }

    public function secondary_genre_relationships()
    {
        return $this->hasMany('\App\Models\SecondaryGenre')->get();
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User')->first();
    }
    public function reviews()
    {
        return $this->hasMany('\App\Models\Review')->get();
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'secondary_genres');
    }
    public function avgRating()
    {
        return $this->hasMany('App\Models\Review')->where('title_id', $this->id)->avg('rating');
    }

    use HasFactory;
}
