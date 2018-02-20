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
            $image->carousel()->associate($this);
            $image->caption = $caption;
            $image->save();
        }
        else {
            $carouselImage['caption'] = $caption;
            $this->images()->create($carouselImage);
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
