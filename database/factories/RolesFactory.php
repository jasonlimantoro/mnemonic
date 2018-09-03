<?php

use App\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['admin', 'author', 'guest', 'editor']),
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

$factory->state(Role::class, 'guest', [
    'name' => 'guest',
    'description' => 'Guest Role'
]);

$factory->state(Role::class, 'editor', [
    'name' => 'editor',
    'description' => 'Editor Role'
]);