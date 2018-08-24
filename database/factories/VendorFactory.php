<?php

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(\App\Models\Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'category_id' => function () {
            return factory(Category::class)->create()->id;
        }
    ];
});
