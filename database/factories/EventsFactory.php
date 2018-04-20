<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
		'name' => $faker->words($nb = 3, $asText = true),
		'description' => $faker->sentence(),
		'location' => $faker->address(),
		'datetime' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+100 years', $timezone = 'Asia/Singapore')
	];
});
