<?php

use Faker\Generator as Faker;

$factory->define(App\BridesBest::class, function (Faker $faker) {
	$firstName = $faker->firstName();
	$lastName = $faker->lastName();
    return [
		'name' => $firstName . ' ' . $lastName,
		'testimony' => $faker->realText(),
		'ig_account' => '@' . $lastName,
		'gender' => $faker->randomElement($array = array('male', 'female'))
    ];
});
