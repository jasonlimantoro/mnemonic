<?php

namespace App;


use App\Traits\FiltersSearch;

class Category extends Model
{
    use FiltersSearch;
	public function vendors()
	{
		return $this->morphedByMany(Vendor::class, 'categoriable');
	}
}
