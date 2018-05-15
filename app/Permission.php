<?php

namespace App;


class Permission extends Model
{
    public function roles()
	{
		return $this->belongsToMany(Role::class)
					->using(PermissionRole::class)
					->withPivot('action');
	}
}
