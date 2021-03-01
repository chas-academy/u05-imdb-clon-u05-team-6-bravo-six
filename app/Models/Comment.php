<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var mixed
     */
    private $name;
    /**
     * @var mixed
     */
    private $comment;
    /**
     * @var bool|mixed
     */
    private $approved;

    public static function find(Comment $comment)
    {
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User')->first();
    }

    public function review()
    {
        return $this->belongsTo('\App\Model\Review')->first();
    }

    public function title()
    {
        return $this->review()->title(); //why not??
    }

    use HasFactory;
}
