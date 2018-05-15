<?php

namespace App;


class Role extends Model
{
	public function user()
	{
		return $this->belongsToMany(User::class);
	}
}
