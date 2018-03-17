<?php

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Null_;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                [
                    'featured' => 1,
                    'caption' => null,
                    'file_name' => 'engagement-1.jpg',
                    'url_asset' => url('/uploads/engagement-1.jpg'),
					'url_cache' => url('/imagecache/gallery/engagement-1.jpg'),
					'imageable_id' => 1,
					'imageable_type' => 'App\Album',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 1,
                    'caption' => null,
                    'file_name' => 'engagement-1.jpg',
                    'url_asset' => url('/uploads/engagement-1.jpg'),
					'url_cache' => url('/imagecache/gallery/engagement-1.jpg'),
					'imageable_id' => 2,
					'imageable_type' => 'App\Carousel',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 0,
                    'caption' => null,
                    'file_name' => 'engagement-2.jpg',
                    'url_asset' => url('/uploads/engagement-2.jpg'),
					'url_cache' => url('/imagecache/gallery/engagement-2.jpg'),
					'imageable_id' => 2,
					'imageable_type' => 'App\Album',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 1,
                    'caption' => null,
                    'file_name' => 'wisuda-1.png',
                    'url_asset' => url('/uploads/wisuda-1.png'),
                    'url_cache' => url('/imagecache/gallery/wisuda-1.png'),
					'imageable_id' => 3,
					'imageable_type' => 'App\Album',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 0,
                    'caption' => 'Victor lenny 2',
                    'file_name' => 'victor-lenny-2.jpg',
                    'url_asset' => url('/uploads/victor-lenny-2.jpg'),
                    'url_cache' => url('/imagecache/gallery/victor-lenny-2.jpg'),
					'imageable_id' => 2,
					'imageable_type' => 'App\Album',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 0,
                    'caption' => 'Victor lenny 2',
                    'file_name' => 'victor-lenny-2.jpg',
                    'url_asset' => url('/uploads/victor-lenny-2.jpg'),
                    'url_cache' => url('/imagecache/gallery/victor-lenny-2.jpg'),
					'imageable_id' => 1,
					'imageable_type' => 'App\Carousel',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 0,
                    'caption' => 'Victor Lenny 3',
                    'file_name' => 'victor-lenny-3.jpg',
                    'url_asset' => url('/uploads/victor-lenny-3.jpg'),
                    'url_cache' => url('/imagecache/gallery/victor-lenny-3.jpg'),
					'imageable_id' => 2,
					'imageable_type' => 'App\Album',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 0,
                    'caption' => 'Victor Lenny 3',
                    'file_name' => 'victor-lenny-3.jpg',
                    'url_asset' => url('/uploads/victor-lenny-3.jpg'),
                    'url_cache' => url('/imagecache/gallery/victor-lenny-3.jpg'),
					'imageable_id' => 1,
					'imageable_type' => 'App\Carousel',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 1,
                    'caption' => null,
                    'file_name' => 'avatar2.png',
                    'url_asset' => url('/uploads/avatar2.png'),
                    'url_cache' => url('/imagecache/gallery/avatar2.png'),
					'imageable_id' => 4,
					'imageable_type' => 'App\Album',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 1,
                    'caption' => 'Backkk',
                    'file_name' => 'victor-lenny-1.jpg',
                    'url_asset' => url('/uploads/victor-lenny-1.jpg'),
                    'url_cache' => url('/imagecache/gallery/victor-lenny-1.jpg'),
					'imageable_id' => 2,
					'imageable_type' => 'App\Album',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 1,
                    'caption' => 'Backkk',
                    'file_name' => 'victor-lenny-1.jpg',
                    'url_asset' => url('/uploads/victor-lenny-1.jpg'),
                    'url_cache' => url('/imagecache/gallery/victor-lenny-1.jpg'),
					'imageable_id' => 1,
					'imageable_type' => 'App\Carousel',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 0,
                    'caption' => null,
                    'file_name' => 'groom.jpg',
                    'url_asset' => url('/uploads/groom.jpg'),
                    'url_cache' => url('/imagecache/gallery/groom.jpg'),
					'imageable_id' => 1,
					'imageable_type' => "App\Couple",
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'featured' => 0,
                    'caption' => null,
                    'file_name' => 'bride.jpg',
                    'url_asset' => url('/uploads/bride.jpg'),
                    'url_cache' => url('/imagecache/gallery/bride.jpg'),
					'imageable_id' => 2,
					'imageable_type' => "App\Couple",
                    'created_at' => NOW(),
                    'updated_at' => NOW()
				]
            ]
        );
    }
}
