<?php

namespace App;
use App\Image;

class Carousel extends Model
{
    public function images() {
        return $this->hasMany(Image::class);
    }

    public function addImage($carouselImage){
        
        // if the file exists but not attached to any carousel
        $detached = Image::where('file_name', $carouselImage->file_name)
                                    ->whereNull('carousel_id')
                                    ->first();
        if ($detached) {
            // set the carousel_id
            $this->attach($record = $detached, $carouselImage->caption);
        }
        else {
            // a new record
            $this->images()->save($carouselImage);
        }
    }

    public function removeImage($carousel, $image) {
        // detach image from the carousel
        $record = $image;
        $this->detach($record);
    }

    public function detach($record) {
        $record->update([
            'carousel_id' => NULL
        ]);
    }

    public function attach($record, $caption){
        $record->update([
            'carousel_id' => $this->id,
            'caption' => $caption
        ]);
    }
}
