<?php

namespace App;


use App\Traits\FiltersSearch;

class BridesBest extends Model
{
    use FiltersSearch;
	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');
	}
}
