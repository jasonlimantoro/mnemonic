<?php

namespace App;
use App\CarouselImage;

class Carousel extends Model
{
    public function images() {
        return $this->hasMany(CarouselImage::class);
    }

    public function addImage($carouselImage){
        
        // if the file exists but carousel_id is NULL
        $detached = CarouselImage::where('file_name', $carouselImage->file_name)
                                    ->whereNull('carousel_id')
                                    ->first();
        if ($detached) {
            // set the carousel_id to 1
            $this->attach($record = $detached);
        }
        else {
            // a new record
            $this->images()->save($carouselImage);
        }
    }

    public function removeImage($carousel, $image) {
        // detach image from the carousel
        $record = $this->images()->find($image->id);
        $this->detach($record);
    }

    public function detach($record) {
        $record->update([
            'carousel_id' => NULL
        ]);
    }

    public function attach($record){
        $record->update([
            'carousel_id' => 1
        ]);
    }
}
