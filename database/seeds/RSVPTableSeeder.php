<?php

use Illuminate\Database\Seeder;
use App\Models\RSVP;

class RSVPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(RSVP::class, 5)->states('pending')->create();
		factory(RSVP::class, 5)->states('confirmed')->create();
		factory(RSVP::class, 5)->states('not coming')->create();
    }
}
