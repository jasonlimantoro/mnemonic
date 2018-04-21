<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 2),
        'page_id' => $faker->numberBetween($min = 1, $max = 2),
        'title' => str_replace('.', '', title_case($faker->sentence())),
        'body'=> $faker->paragraph($nbSentences = 30, $variableNbSentences = true),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Singapore'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Singapore')
    ];
});
