<?php

namespace App;

class Vendor extends Model
{
	public function categories()
	{
		return $this->morphToMany(Category::class, 'categoriable');
	}
}
