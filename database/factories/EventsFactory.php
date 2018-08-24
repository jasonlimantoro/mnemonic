<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Event::class, function (Faker $faker) {
    return [
		'name' => $faker->words($nb = 3, $asText = true),
		'description' => $faker->sentence(),
		'location' => $faker->address(),
		'datetime' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years', $timezone = 'Asia/Jakarta')
	];
});

$factory->state(\App\Models\Event::class, 'birthday', [
	'name' => 'Birthday'
]);

$factory->state(\App\Models\Event::class, 'wedding', [
	'name' => 'Wedding Reception'
]);

$factory->state(\App\Models\Event::class, 'holymatrimony', [
	'name' => 'Holy Matrimony'
]);