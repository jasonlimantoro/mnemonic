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
    
    public function addPost(array $attributes) {
		$attributes['user_id'] = auth()->user()->id;
		return $this->posts()->create($attributes);
    }
}
