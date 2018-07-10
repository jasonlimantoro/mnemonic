<?php

use Faker\Generator as Faker;
use App\Permission;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'carousel images',
            'post',
            'gallery',
			'vip',
			'embed_video',
            'event',
            'bridesmaid_bestman',
            'vendor',
            'vendor_categories',
            'rsvp',
            'site_info',
            'site_social',
            'site_seo',
            'user',
            'role',
        ]),
        'action' => $faker->randomElements(
            ['create', 'read', 'update', 'delete'],
			$faker->numberBetween(1, 4)
		),
		'description' => $faker->sentence,
    ];
});

$factory->state(Permission::class, 'complete', [
	'action' => [
		'create',
		'read',
		'update',
		'delete',
	]
]);

$factory->state(Permission::class, 'incomplete',[
	'action' => [
		'read',
		'update',
	]
]); 

$factory->state(Permission::class, 'manageable', [
	'action' => ['manage']
]);

$factory->state(Permission::class, 'post', [
	'name' => 'post'
]);

$factory->state(Permission::class, 'gallery', [
	'name' => 'gallery'
]);

$factory->state(Permission::class, 'carousel images', [
	'name' => 'carousel images'
]);

$factory->state(Permission::class, 'vip', [
	'name' => 'vip'
]);

$factory->state(Permission::class, 'event', [
	'name' => 'event'
]);

$factory->state(Permission::class, 'bridesmaid_bestman', [
	'name' => 'bridesmaid_bestman'
]);

$factory->state(Permission::class, 'embed_video', [
	'name' => 'embed_video'
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
