<?php

namespace App;

use App\Vendor;

class Category extends Model
{
	public function vendors()
	{
		return $this->morphedByMany(Vendor::class, 'categoriable');
	}
}
