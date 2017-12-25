<?php

use Illuminate\Database\Seeder;

class AlbumImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('album_images')->insert(
            [
                [
                    'album_id' => 1,
                    'file_name' => 'engagement-1.jpg',
                    'url_asset' => asset('uploads/album/engagement-1.jpg'),
                    'url_cache' => url('imagecache/fit/engagement-1.jpg'),
                    'updated_at' => NOW(),
                    'created_at' => NOW()
                ],
                [
                    'album_id' => 1,
                    'file_name' => 'engagement-2.jpg',
                    'url_asset' => asset('uploads/album/engagement-2.jpg'),
                    'url_cache' => url('imagecache/fit/engagement-2.jpg'),
                    'updated_at' => NOW(),
                    'created_at' => NOW()
                ],

                [
                    'album_id' => 3,
                    'file_name' => 'wisuda-1.png',
                    'url_asset' => asset('uploads/album/wisuda-1.png'),
                    'url_cache' => url('imagecache/fit/wisuda-1.png'),
                    'updated_at' => NOW(),
                    'created_at' => NOW()
                ],
            ]
        );
    }
}
