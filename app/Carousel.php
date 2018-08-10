<?php

namespace App;

use App\Traits\HasManyImages;

class Carousel extends Model
{
    use HasManyImages;

    public $filter = 'gallery';

	public function images(){
		return $this->morphMany(Image::class, 'imageable');
	}
    
    public function page(){
        return $this->belongsTo(Page::class);
    }
}
