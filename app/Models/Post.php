<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * defines one to one realtionship with the blog post author (User)
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    /**
     * Defines a one to many realtionships with comment as a post can have many comments
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
