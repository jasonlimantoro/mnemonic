<?php

use Faker\Generator as Faker;

$factory->define(App\Couple::class, function (Faker $faker) {
    return [
		'mother' => $faker->firstNameFemale,
		'father' => $faker->firstNameMale,
    ];
});

$factory->state(App\Couple::class, 'male', function (Faker $faker){
	return [
		'name' => $faker->firstNameMale . ' ' . $faker->lastName,
		'gender' => 'male'
	];
});

$factory->state(App\Couple::class, 'female', function (Faker $faker){
	return [
		'name' => $faker->firstNameFemale . ' ' . $faker->lastName,
		'gender' => 'female'
	];
});
