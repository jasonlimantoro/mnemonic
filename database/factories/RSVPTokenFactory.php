<?php

use Faker\Generator as Faker;
use App\Models\RSVP;

$factory->define(\App\Models\RSVPToken::class, function (Faker $faker) {
    return [
        'rsvp_id' => function (){
			return factory(RSVP::class)->states('pending')->create()->id;
		},
		'token' => str_random(50)
    ];
});
