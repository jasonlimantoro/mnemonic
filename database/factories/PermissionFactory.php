<?php

use Faker\Generator as Faker;
use App\Permission;

$factory->define(App\Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([
            'carousel images',
            'post',
            'gallery',
            'album',
            'couple',
            'event',
            'bridesmaid_bestman',
            'vendor',
            'vendor_categories',
            'rsvp',
            'site_info',
            'social_media',
            'seo',
            'user',
            'role',
        ]),
        'action' => json_encode($faker->randomElements(
            ['create', 'read', 'update', 'delete'],
			$faker->numberBetween(2, 4)
		)),
		'description' => $faker->sentence,
    ];
});

$factory->state(Permission::class, 'complete', function(Faker $faker){
	return [
		'action' => json_encode([
			'create' => $faker->randomElement([true, false]),
			'read' => $faker->randomElement([true, false]),
			'update' => $faker->randomElement([true, false]),
			'delete' => $faker->randomElement([true, false]),
		])
	];
});

$factory->state(Permission::class, 'incomplete', function(Faker $faker){
	return [
		'action' => json_encode([
			'read' => $faker->randomElement([true, false]),
			'update' => $faker->randomElement([true, false]),
		])
	];
});