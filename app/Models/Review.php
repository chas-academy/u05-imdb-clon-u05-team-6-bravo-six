<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['body', 'title'];

    public function user()
    {
        return $this->belongsTo('\App\Models\User')->first();
    }

    public function title()
    {
        return $this->belongsTo('\App\Models\Title')->first();
    }

    public function comments()
    {
        return $this->hasMany('\App\Models\Comment')->get();
        
    }
    public function commentsQuery(){
        return $this->hasMany('\App\Models\Comment');
    }
    use HasFactory;
}
