<?php

use Faker\Generator as Faker;

$factory->define(App\RSVP::class, function (Faker $faker) {
	$status = $faker->randomElement($array = array('pending', 'confirmed', 'not coming'));
	$reminder = $status == 'pending' ? 0 : 1;
    return [
		'name' => $faker->name(),
		'email' => $faker->email(),
		'phone' => $faker->phoneNumber,
		'table_name' => $faker->word,
		'total_invitation' => $faker->randomDigitNotNull,
		'reminder_count' => $reminder,
		'status' => $status,
    ];
});
