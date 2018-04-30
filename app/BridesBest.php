<?php

namespace App;


class BridesBest extends Model
{
	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');
	}
}
