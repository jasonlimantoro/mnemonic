<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;

class AlbumImage extends Model
{
    public function album() {
        return $this->belongsTo(Album::class);
    }
}
