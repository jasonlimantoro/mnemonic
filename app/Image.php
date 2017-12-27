<?php

namespace App;

use App\Album;
use App\Carousel;

class Image extends Model
{
    public function album(){
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function carousel(){
        return $this->belongsTo(Carousel::class, 'carousel_id');
    }
}
