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

    public function carousel(){
        return $this->hasOne(Carousel::class);
    }
    
    public function addPost($title, $body, $user_id) {
        $this->posts()->create(compact(['title', 'body', 'user_id']));

    }
}
