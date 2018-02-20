<?php

namespace App;
use App\Image;
use App\Page;

class Carousel extends Model
{
    public function images() {
        return $this->hasMany(Image::class);
    }
    
    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function addImage($carouselImage, $caption = null){
        // if the file exists but not attached to any carousel
        $image = Image::firstOrNew($carouselImage);
        if($image->exists){
            // set the foreign key along with the caption
            $image->carousel()->associate($this);
            $image->caption = $caption;
            $image->save();
        }
        else {
            $carouselImage['caption'] = $caption;
            $this->images()->create($carouselImage);
        }
    }

    public function removeImage($image) {
        $image->carousel()->dissociate();
        $image->caption = null;
        $image->save();
    }
}
