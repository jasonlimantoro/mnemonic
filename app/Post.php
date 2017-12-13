<?php

namespace App;


class Post extends Model
{
    public function user() { // $post->user->name
        return $this->belongsTo(User::class);
    }

    public function page() {
        return $this->belongsTo(Page::class);
    }
}
