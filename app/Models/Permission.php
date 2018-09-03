<?php

namespace App\Models;


/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property array $action
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereUpdatedAt($value)
 *
 */
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
