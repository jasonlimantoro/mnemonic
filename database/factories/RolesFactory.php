<?php

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
		'name' => $faker->word,
		'label' => $faker->sentence
    ];
});

$factory->state(Role::class, 'admin', [
	'name' => 'admin',
	'label' => 'Administration Role' 
]);

$factory->state(Role::class, 'author', [
	'name' => 'author',
	'label' => 'Author Role' 
]);

$factory->state(Role::class, 'user', [
	'name' => 'user',
	'label' => 'User Role' 
]);