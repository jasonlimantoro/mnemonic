<?php

use Faker\Generator as Faker;

$factory->define(App\RSVP::class, function (Faker $faker) {
    return [
		'name' => $faker->name(),
		'email' => $faker->email(),
		'phone' => $faker->phoneNumber,
		'table_name' => $faker->word,
		'total_invitation' => $faker->randomDigitNotNull,
		'reminder_count' => $faker->randomElement($array = array(0, 1)),
		'status' => $faker->randomElement($array = array('new', 'confirmed', 'not coming')),
    ];
});
