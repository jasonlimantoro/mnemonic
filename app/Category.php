<?php

namespace App;

use App\Traits\FiltersSearch;

class Category extends Model
{
    use FiltersSearch;

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
