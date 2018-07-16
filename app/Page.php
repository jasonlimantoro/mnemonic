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

    public static function home()
    {
        return static::where('title', 'like', '%home%')->first();
    }
    public static function about()
    {
        return static::where('title', 'like', '%about%')->first();
    }

    /**
     * Add a post to given page, with associated user
     *
     * @param array $attributes
     * @return Post
     */
    public function addPost(array $attributes) {
		$attributes['user_id'] = auth()->user()->id;
		return $this->posts()->create($attributes);
    }
}
