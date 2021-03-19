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

    public function addReview()
    {
        $this->review()->create(['body' => $body]);
    }

    public function genres() //this is to be used in the search method of title-controller
    {
        return $this->belongsToMany(Genre::class, 'secondary_genres');
    } //i realize now this is the way we should've done it from the start... doh
    use HasFactory;
}
//  array_filter($genres->toArray(), function($genre) { return $genre['id'] > 10; } );