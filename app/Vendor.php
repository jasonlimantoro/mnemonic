<?php

namespace App;

use App\Traits\FiltersSearch;

class Vendor extends Model
{
	use FiltersSearch;

	protected $with = ['categories'];
	public function categories()
	{
		return $this->morphToMany(Category::class, 'categoriable');
	}
}
