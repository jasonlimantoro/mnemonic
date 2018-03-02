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
                    'album_id' => 1,
                    'carousel_id' => 2,
                    'featured' => 1,
                    'caption' => null,
                    'file_name' => 'engagement-1.jpg',
                    'url_asset' => 'https://mnemonic.dev/uploads/album/engagement-1.jpg',
                    'url_cache' => 'https://mnemonic.dev/imagecache/gallery/engagement-1.jpg',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'album_id' => 1,
                    'carousel_id' => null,
                    'featured' => 0,
                    'caption' => null,
                    'file_name' => 'engagement-2.jpg',
                    'url_asset' => 'https://mnemonic.dev/uploads/album/engagement-2.jpg',
                    'url_cache' => 'https://mnemonic.dev/imagecache/gallery/engagement-2.jpg',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'album_id' => 3,
                    'carousel_id' => null,
                    'featured' => 1,
                    'caption' => null,
                    'file_name' => 'wisuda-1.png',
                    'url_asset' => 'https://mnemonic.dev/uploads/album/wisuda-1.png',
                    'url_cache' => 'https://mnemonic.dev/imagecache/gallery/wisuda-1.png',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'album_id' => 2,
                    'carousel_id' => 1,
                    'featured' => 0,
                    'caption' => 'Victor lenny 2',
                    'file_name' => 'victor-lenny-2.jpg',
                    'url_asset' => 'https://mnemonic.dev/uploads/album/victor-lenny-2.jpg',
                    'url_cache' => 'https://mnemonic.dev/imagecache/gallery/victor-lenny-2.jpg',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'album_id' => 2,
                    'carousel_id' => 1,
                    'featured' => 0,
                    'caption' => 'Victor Lenny 3',
                    'file_name' => 'victor-lenny-3.jpg',
                    'url_asset' => 'https://mnemonic.dev/uploads/album/victor-lenny-3.jpg',
                    'url_cache' => 'https://mnemonic.dev/imagecache/gallery/victor-lenny-3.jpg',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'album_id' => 4,
                    'carousel_id' => null,
                    'featured' => 1,
                    'caption' => null,
                    'file_name' => 'apple-pay.png',
                    'url_asset' => 'https://mnemonic.dev/uploads/apple-pay.png',
                    'url_cache' => 'https://mnemonic.dev/imagecache/gallery/apple-pay.png',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
                [
                    'album_id' => 2,
                    'carousel_id' => 1,
                    'featured' => 1,
                    'caption' => 'Backkk',
                    'file_name' => 'victor-lenny-1.jpg',
                    'url_asset' => 'https://mnemonic.dev/uploads/album/victor-lenny-1.jpg',
                    'url_cache' => 'https://mnemonic.dev/imagecache/gallery/victor-lenny-1.jpg',
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ],
            ]
        );
    }
}
