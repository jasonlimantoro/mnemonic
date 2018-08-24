<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Album::class, function (Faker $faker) {
    return [
        "name" => $faker->word,
        "description" => $faker->sentence,
    ];
});
