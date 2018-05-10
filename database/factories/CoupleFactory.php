<?php

use Faker\Generator as Faker;

$factory->define(App\Couple::class, function (Faker $faker) {
    return [
		'name' => $faker->firstNameMale . ' ' . $faker->lastName,
		'mother' => $faker->firstNameFemale,
		'father' => $faker->firstNameMale,
		'gender' => $faker->randomElement(['male', 'female'])
    ];
});
