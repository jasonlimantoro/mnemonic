<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Carousel::class, function (Faker $faker) {
    return [
        'page_id' => $faker->numberBetween(1, 10)
    ];
});
