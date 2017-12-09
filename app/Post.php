<?php

namespace App;


class Post extends Model
{
    public function user() {
        $this->belongsTo(User::class);
    }
}
