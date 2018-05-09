<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(App\Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'category_id' => function () {
            return factory(Category::class)->create()->id;
        }
    ];
});
