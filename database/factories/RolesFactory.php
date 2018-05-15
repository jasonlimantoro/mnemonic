<?php

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['admin', 'author', 'user']),
        'description' => $faker->sentence
    ];
});

$factory->state(Role::class, 'admin', [
    'name' => 'admin',
    'description' => 'Administration Role'
]);

$factory->state(Role::class, 'author', [
    'name' => 'author',
    'description' => 'Author Role'
]);

$factory->state(Role::class, 'user', [
    'name' => 'user',
    'description' => 'User Role'
]);
