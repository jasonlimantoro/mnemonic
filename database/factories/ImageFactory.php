<?php

use Faker\Generator as Faker;
use PHPUnit\Framework\Constraint\IsFalse;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'album_id' => function(){
            return factory(App\Album::class)->create()->id;
        },
        // 'album_id' => $faker->numberBetween($min = 1, $max = 4),
        'caption' => $faker->sentence,
        'file_name' => $faker->word . '.jpg',
        'url_asset' => $faker->imageUrl($width = 640, $height = 480),
        'url_cache' => $faker->imageUrl($width = 640, $height = 480, 'cats')
    ];
});
