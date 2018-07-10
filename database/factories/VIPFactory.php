<?php

use Faker\Generator as Faker;

$factory->define(App\VIP::class, function (Faker $faker) {
    return [
		'name' => $faker->firstNameMale . ' ' . $faker->lastName,
		'mother' => $faker->firstNameFemale,
		'father' => $faker->firstNameMale,
    ];
});

$factory->state(App\VIP::class, 'male', function (Faker $faker){
	return [
		'name' => $faker->firstNameMale . ' ' . $faker->lastName,
		'gender' => 'male'
	];
});

$factory->state(App\VIP::class, 'female', function (Faker $faker){
	return [
		'name' => $faker->firstNameFemale . ' ' . $faker->lastName,
		'gender' => 'female'
	];
});
