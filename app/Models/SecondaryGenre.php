<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryGenre extends Model
{
    public function title()
    {
        return $this->belongsTo('\App\Models\Title')->first();
    }

    public function genre()
    {
        return $this->belongsTo('\App\Models\Genre')->first();
    }
    use HasFactory;
}
