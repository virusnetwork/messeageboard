<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * defines the parent of the comment (what the comment is about)
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    /**
     * defines who the author of the comment is
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
