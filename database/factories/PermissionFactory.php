<?php

use Faker\Generator as Faker;
use App\Permission;

$factory->define(Permission::class, function (Faker $faker) {
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
            'site_social',
            'stie_seo',
            'user',
            'role',
        ]),
        'action' => $faker->randomElements(
            ['create', 'read', 'update', 'delete'],
			$faker->numberBetween(2, 4)
		),
		'description' => $faker->sentence,
    ];
});

$factory->state(Permission::class, 'complete', function(Faker $faker){
	return [
		'action' => [
			'create' => $faker->randomElement([true, false]),
			'read' => $faker->randomElement([true, false]),
			'update' => $faker->randomElement([true, false]),
			'delete' => $faker->randomElement([true, false]),
		]
	];
});

$factory->state(Permission::class, 'incomplete', function(Faker $faker){
	return [
		'action' => [
			'read' => $faker->randomElement([true, false]),
			'update' => $faker->randomElement([true, false]),
		]
	];
});

$factory->state(Permission::class, 'post', [
	'name' => 'post'
]);

$factory->state(Permission::class, 'gallery', [
	'name' => 'gallery'
]);

$factory->state(Permission::class, 'carousel images', [
	'name' => 'carousel images'
]);

$factory->state(Permission::class, 'album', [
	'name' => 'album'
]);

$factory->state(Permission::class, 'couple', [
	'name' => 'couple'
]);

$factory->state(Permission::class, 'event', [
	'name' => 'event'
]);

$factory->state(Permission::class, 'bridesmaid_bestman', [
	'name' => 'bridesmaid_bestman'
]);

$factory->state(Permission::class, 'vendor', [
	'name' => 'vendor'
]);

$factory->state(Permission::class, 'vendor_categories', [
	'name' => 'vendor_categories'
]);
$factory->state(Permission::class, 'rsvp', [
	'name' => 'rsvp'
]);
$factory->state(Permission::class, 'site_info', [
	'name' => 'site_info'
]);

$factory->state(Permission::class, 'site_social', [
	'name' => 'site_social'
]);

$factory->state(Permission::class, 'site_seo', [
	'name' => 'site_seo'
]);

$factory->state(Permission::class, 'user', [
	'name' => 'user'
]);

$factory->state(Permission::class, 'role', [
	'name' => 'role'
]);
