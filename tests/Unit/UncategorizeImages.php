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
        $album = factory(Album::class)->create();
        $uncategorizedAlbum = factory(Album::class)->create([
            'name' => 'Uncategorized'
        ]);

        $images = factory(Image::class, 5)->create([
            'imageable_id' => $album->id
        ]);

        $album->uncategorizeImages();

        return $this->assertCount(5, $uncategorizedAlbum->images);
    }
}
