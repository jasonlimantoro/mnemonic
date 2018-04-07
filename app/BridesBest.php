<?php

namespace App;

use App\Image; 
use App\Album;

class BridesBest extends Model
{
	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');
	}
}
