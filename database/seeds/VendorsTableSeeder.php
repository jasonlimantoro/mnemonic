<?php

use Illuminate\Database\Seeder;
use App\Vendor;
use App\Category;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$vendors = factory(Vendor::class, 15)->create();
    }
}
