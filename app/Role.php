<?php

namespace App;

use App\Traits\FiltersSearch;

class Role extends Model
{
    use FiltersSearch;

    public function users()
    {
        return $this->hasMany(User::class);
	}
	
	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}
}
