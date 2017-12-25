<?php

namespace App;

use App\Album;

class AlbumImage extends Model
{
    public function album() {
        return $this->belongsTo(Album::class);
    }
}
