<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;

class withAlbumTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWithAlbum()
    {
        $categorizedAlbum = factory(\App\Album::class, 3)->create();
        $uncategorizedAlbum = factory(\App\Album::class)->create([
            'name' => 'Uncategorized',
        ]);
        

        $categorizedImage = factory(Image::class, 5)->create();
        $uncategorizedImage = factory(Image::class, 2)->create([
            'album_id' => 4
        ]);

        $withAlbum = Image::withAlbum();

        // dd($withAlbum);
        // proper format
        $this->assertCount(5, $withAlbum);

    }
}
