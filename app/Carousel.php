<?php

namespace App;
use App\Image;
use App\Page;
use App\Album;

class Carousel extends Model 
{
	public function images(){
		return $this->morphMany(Image::class, 'imageable');
	}
    
    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function removeImage($image) {
		$image->delete();
    }
}
