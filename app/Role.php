<?php

namespace App;

class Role extends Model
{
    protected $with = ['permissions'];

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
        if ($permission->exists()) {
            $actions = $permission->first()->pivot->action;
        }
        return $actions;
    }

    public function allowables(string $permissionName)
    {
        $allowedActions = [];
        if ($this->permissions()->exists()) {
            $actions = $this->getActions($permissionName);
            $allowedActions = static::isAllowed($actions);
        }
        return $allowedActions;
    }

    public function notAllowables(string $permissionName)
    {
        $allowedActions = [];
        if ($this->permissions()->exists()) {
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
	
	public function syncAllowedActions(array $permissionRequests)
	{
		$this->detachAllowedActions($permissionRequests);
		
		foreach ($permissionRequests as $id => $actions) {
			$permission = Permission::find($id);

			$actionables = $permission->action;

			$allowedActions = merge_array_to_assoc_array($actions, $actionables);

			$permission->updateOrAttachPivot($this, $allowedActions);
		}
	}

	public function detachAllowedActions(array $received)
	{
		$permissions = Permission::pluck('id')->toArray();

		$notReceived = array_diff($permissions, array_keys($received));

		$this->permissions()->detach($notReceived);
	}
}
