<?php

use Faker\Generator as Faker;
use App\Setting;

$factory->define(App\Setting::class, function (Faker $faker) {
    return [
		'name' => $faker->word,
		'key' => $faker->word,
		'value' => [
			$faker->word => $faker->sentence,
			$faker->word => $faker->sentence
		]
    ];
});

$factory->state(Setting::class, 'site-info', [
		'name' => 'Site Info',
		'key' => 'site-info',
	]
);

$factory->state(Setting::class, 'site-social', [
	'name' => 'Site Social',
	'key' => 'site-social',
]);

$factory->state(Setting::class, 'site-seo', [
		'name' => 'Site SEO',
		'key' => 'site-seo',
	]
);