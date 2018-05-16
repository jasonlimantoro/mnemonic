<?php

use Faker\Generator as Faker;
use App\PermissionRole;
use App\Permission;
use App\Role;


$factory->define(PermissionRole::class, function (Faker $faker) {

	// creating permission
	$p = factory(Permission::class)->make();
	repeatCreatePermission:
	try {
		$p->save();
	} catch (\Illuminate\Database\QueryException $e) {
		$p = factory(Permission::class)->make();
		goto repeatCreatePermission;
	}

	// creating role
	$r = factory(Role::class)->make();
	repeatCreateRole:
	try {
		$r->save();
	} catch (\Illuminate\Database\QueryException $e) {
		$r = factory(Role::class)->make();
		goto repeatCreateRole;
	}

    return [
		'permission_id' => $p->id,
		'role_id' => $r->id,
		'action' => [
			'create' => $faker->randomElement([true, false]),
			'read' => $faker->randomElement([true, false]),
			'update' => $faker->randomElement([true, false]),
			'delete' => $faker->randomElement([true, false]),
		]
    ];
});
