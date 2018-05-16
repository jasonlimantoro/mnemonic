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
	
	public function getActions(string $permissionName)
	{
		$actions = [];
		$permission = $this->permissions()->whereName($permissionName);
		if($permission->get()->isNotEmpty()) {
			$actions = $permission->first()->pivot->action;
		} 
		return $actions;

	}

    public function allowables(string $permissionName)
    {
		$allowedActions = [];
		if($this->permissions->isNotEmpty()){
			$actions = $this->getActions($permissionName);
			$allowedActions = static::isAllowed($actions);
		}
		return $allowedActions;
	}
	
	public function notAllowables(string $permissionName)
	{
		$allowedActions = [];
		if($this->permissions->isNotEmpty()){
			$actions = $this->getActions($permissionName);
			$allowedActions = static::isNotAllowed($actions);
		}
		return $allowedActions;
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
