<?php

namespace App;


class Category extends Model
{

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
        // return $this->morphedByMany(Vendor::class, 'categoriable');
	}
	
	public function addVendor($attributes = [])
	{
		return $this->vendor()->create($attributes);
	}
}
