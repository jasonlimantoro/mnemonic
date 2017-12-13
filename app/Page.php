<?php

namespace App;


class Page extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
