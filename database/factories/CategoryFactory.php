<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
		'name' => $faker->word,
		'description' => $faker->sentence($nbWords = 6)
    ];
});
