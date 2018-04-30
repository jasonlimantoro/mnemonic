<?php

namespace App;


class CarouselImage extends Model
{
    public function carousel() {
        return $this->belongsTo(Carousel::class);
    }
}
