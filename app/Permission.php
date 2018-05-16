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
}
