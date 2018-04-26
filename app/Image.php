<?php

namespace App;

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
