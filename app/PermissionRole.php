<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PermissionRole extends Pivot
{
	protected $table = 'permission_role';

	protected $casts = [
		'action' => 'array'
	];
	
	// public function getActionAttribute($value)
	// {
	// 	return json_decode($value);
	// }

	public function setActionAttribute($value)
	{
		$this->attributes['action'] = json_encode($value);
	}
}
