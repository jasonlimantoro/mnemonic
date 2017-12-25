<?php

namespace App;
use App\CarouselImage;

class Carousel extends Model
{
    public function images() {
        return $this->hasMany(CarouselImage::class);
    }

    public function addImage($caption, $file_name, $url_asset, $url_cache){
        
        // save to the database
        $this->images()->create(compact([
            'caption', 'file_name', 'url_asset', 'url_cache'
            ])
        );

    }
}
