<?php

namespace App;


class AlbumImage extends Model
{
    public function album() {
        return $this->belongsTo(Album::class);
    }
}
