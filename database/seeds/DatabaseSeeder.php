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
            CarouselImagesTableSeeder::class,
            CarouselsTableSeeder::class,
            AlbumImagesTableSeeder::class,
            AlbumsTableSeeder::class
        ]);
    }
}
