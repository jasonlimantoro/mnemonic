<?php

use Faker\Generator as Faker;
use App\Album;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'caption' => $faker->sentence,
        'file_name' => $faker->word . '.jpg',
        'url_asset' => $faker->imageUrl($width = 640, $height = 480),
		'url_cache' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
		'imageable_id' => function(){
			return factory(Album::class)->create()->id;
		},  
		'imageable_type' => 'App\\Album',
    ];
});
