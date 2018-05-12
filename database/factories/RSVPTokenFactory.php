<?php

use Faker\Generator as Faker;
use App\RSVP;

$factory->define(App\RSVPToken::class, function (Faker $faker) {
    return [
        'rsvp_id' => function (){
			return factory(RSVP::class)->states('pending')->create()->id;
		},
		'token' => str_random(50)
    ];
});
