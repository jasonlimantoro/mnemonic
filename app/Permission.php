<?php

namespace App;


class Permission extends Model
{
	protected $casts = [
		'action' => 'array'
	];
	
    public function roles()
	{
		return $this->belongsToMany(Role::class)
					->using(PermissionRole::class)
					->withPivot('action');
	}

	public function getActions(string $roleName)
	{
		$actions = [];
		$role = $this->roles()->whereName($roleName);
		if($role->exists()) {
			$actions = $role->first()->pivot->action;
		} 
		return $actions;

	}
	public function actionables(string $roleName)
	{
		$allowedActions = [];
		if($role = $this->roles()->exists()){
			$actions = $this->getActions($roleName);
			$allowedActions = static::isActionable($actions);
		}
		return $allowedActions;
	}

	public function notActionables(string $roleName)
	 {
		$allowedActions = [];
		if($role = $this->roles()->exists()){
			$actions = $this->getActions($roleName);
			$allowedActions = static::isNotActionable($actions);
		}
		return $allowedActions;
	}

	public static function isActionable(array $actions)
	{
		return array_keys($actions, true);
	}

	public static function isNotActionable(array $actions)
	{
		return array_keys($actions, false);
	}

	public function updateOrAttachPivot(Role $role, $attributes = [])
	{
		$roles = $this->roles();
		if($roles->whereName($role->name)->doesntExist()){
			$roles->attach($role->id, ['action' => $attributes]);
		} else {
			$roles->updateExistingPivot($role->id, ['action' => $attributes]);
		}
	}
}
