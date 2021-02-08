<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function titles()
    {
        return $this->hasMany('\App\Models\Title')->get();
    }

    public function secondary_genre_relationships()
    {
        return $this->hasMany('\App\Models\SecondaryGenre')->get();
    }

    public function titlesSecondary()
    {
        $rels = $this->secondary_genre_relationships();
        $titles = [];
        foreach ($rels as $rel) {
            array_push($titles, $rel->title());
        };
        return $titles;
    }
    use HasFactory;
}
