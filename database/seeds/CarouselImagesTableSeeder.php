<?php

use Illuminate\Database\Seeder;

class CarouselImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousel_images')->insert(
            [
                [
                    'carousel_id' => 1,
                    'caption' => NULL,
                    'file_name' => 'victor-lenny-1.jpg',
                    'url_asset' => asset('uploads/carousel/victor-lenny-1.jpg'),
                    'url_cache' => url('imagecache/fit/victor-lenny-1.jpg'),
                    'updated_at' => NOW(),
                    'created_at' => NOW()
                ],
                [
                    'carousel_id' => 1,
                    'caption' => "Victor Lenny 2",
                    'file_name' => 'victor-lenny-2.jpg',
                    'url_asset' => asset('uploads/carousel/victor-lenny-2.jpg'),
                    'url_cache' => url('imagecache/fit/victor-lenny-2.jpg'),
                    'updated_at' => NOW(),
                    'created_at' => NOW()
                ],

                [
                    'carousel_id' => 1,
                    'caption' => "Victor Lenny 3",
                    'file_name' => 'victor-lenny-3.jpg',
                    'url_asset' => asset('uploads/carousel/victor-lenny-3.jpg'),
                    'url_cache' => url('imagecache/fit/victor-lenny-3.jpg'),
                    'updated_at' => NOW(),
                    'created_at' => NOW()
                ],
            ]
        );
    }
}
