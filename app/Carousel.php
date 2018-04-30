<?php

namespace App;

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
