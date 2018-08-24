<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\RSVP::class, function (Faker $faker) {
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

$factory->state(\App\Models\RSVP::class, 'pending', function(Faker $faker){
	return [
		'status' => 'pending',
		'reminder_count' => 0
	];
});
$factory->state(\App\Models\RSVP::class, 'confirmed', function(Faker $faker){
	return [
		'status' => 'confirmed',
		'reminder_count' => 1
	];
});

$factory->state(\App\Models\RSVP::class, 'not coming', function(Faker $faker){
	return [
		'status' => 'not coming',
		'reminder_count' => 1
	];
});
