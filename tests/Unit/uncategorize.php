<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Image;
use App\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UncategorizeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUncategorize()
    {
        factory(Album::class)->create();

        $imageWithAlbum = factory(Image::class)->create();
        
        $album = Album::find($imageWithAlbum->album_id);
        $album->uncategorizeImages();

        return $this->assertCount(0, $album->images);
    }
}
