<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    public function carousel() {
        return $this->belongsTo(Carousel::class);
    }
}
