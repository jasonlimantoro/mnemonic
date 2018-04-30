<?php

namespace App;


class Category extends Model
{
	public function vendors()
	{
		return $this->morphedByMany(Vendor::class, 'categoriable');
	}
}
