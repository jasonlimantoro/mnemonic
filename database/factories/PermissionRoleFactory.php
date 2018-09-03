<?php

use Faker\Generator as Faker;
use App\Models\PermissionRole;
use App\Models\Permission;
use App\Models\Role;


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
