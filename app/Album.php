<?php

namespace App;

use App\AlbumImage;

class Album extends Model
{
    public function images(){
        return $this->hasMany(AlbumImage::class);
    }
}
