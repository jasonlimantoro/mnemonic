<?php

namespace Tests\Unit;

use App\Image;
use App\Album;
use Tests\TestCase;
use App\Repositories\Images;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImageRelationships extends TestCase
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

    public function testWithAlbum()
    {
        $image = factory(Image::class, 2)->create();
        $another = factory(Image::class, 3)->create([
            'imageable_type' => 'App\Carousel'
        ]);

        $withAlbum = Images::withAlbum()->get();

        $this->assertCount(2, $withAlbum);
    }
}
