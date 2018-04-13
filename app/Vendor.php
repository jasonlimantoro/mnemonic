<?php

namespace App;
use App\Category;

class Vendor extends Model
{
	public function categories()
	{
		return $this->morphToMany(Category::class, 'categoriable');
	}
}
