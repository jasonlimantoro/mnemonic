<?php

use Illuminate\Database\Seeder;
use App\Models\BridesBest;

class BridesBestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$bridesBests = factory(BridesBest::class, 10)->create();
    }
}
