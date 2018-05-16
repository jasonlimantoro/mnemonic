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
        return $this->belongsToMany(Permission::class)
                    ->using(PermissionRole::class)
                    ->withPivot('action');
    }

    public function allowables()
    {
		$actions = $this->permissions()->first()->pivot->action;
        return static::isAllowed($actions);
	}
	
	public function notAllowables()
	{
		$actions = $this->permissions()->first()->pivot->action;
        return static::isNotAllowed($actions);
	}

    public static function isAllowed(array $actions)
    {
        return array_keys($actions, true);
    }

    public static function isNotAllowed(array $actions)
    {
        return array_keys($actions, false);
    }
}
