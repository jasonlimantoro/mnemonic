<?php

use Illuminate\Database\Seeder;
use App\AlbumImage;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PagesTableSeeder::class,
            PostsTableSeeder::class,
            ImagesTableSeeder::class,
            CarouselsTableSeeder::class,
			AlbumsTableSeeder::class,
			CoupleTableSeeder::class,
			VendorsTableSeeder::class,
			CategoriesTableSeeder::class,
			EventsTableSeeder::class,
			BridesBestsTableSeeder::class
        ]);
    }
}
