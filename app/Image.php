<?php

namespace App;

use App\Album;
use App\Couple;
use App\Carousel;
use App\Traits\UploadsImage;


class Image extends Model
{
	use UploadsImage;

	public function imageable(){
		return $this->morphTo();
	}

    public function isFeatured(){
        return $this->featured;
	}
}
