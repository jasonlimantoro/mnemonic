<?php

namespace App;

use App\Image;

class Album extends Model
{
    public function images(){
        return $this->hasMany(Image::class);
    }
}
