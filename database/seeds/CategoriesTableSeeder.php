<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Vendor;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$categories = factory(Category::class, 10)
						->create()
						->each(function($c){
							$c->vendors()->attach(factory(Vendor::class)->create());
						});	
    }
}
