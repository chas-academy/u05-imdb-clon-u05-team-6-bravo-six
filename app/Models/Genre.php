<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];
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
        return $this->belongsToMany(Title::class, 'secondary_genres');
    }
    use HasFactory;
}
