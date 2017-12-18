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
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    // public function getRouteKeyName(){
    //     return 'title';
    // }
}
