<?php

use Faker\Generator as Faker;
use App\PermissionRole;
use App\Permission;
use App\Role;


$factory->define(PermissionRole::class, function (Faker $faker) {
    return [
		'permission_id' => factory(Permission::class)->create()->id,
		'role_id' => factory(Role::class)->create()->id,
		'action' => [
			'create' => $faker->randomElement([true, false]),
			'read' => $faker->randomElement([true, false]),
			'update' => $faker->randomElement([true, false]),
			'delete' => $faker->randomElement([true, false]),
		]
    ];
});
