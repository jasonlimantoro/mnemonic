<?php

namespace Tests\Integration;

use App\Models\Image;
use App\Models\Event;
use App\Models\Album;
use App\VIP;
use App\Models\Carousel;
use App\Models\BridesBest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignImageToOwnersTest extends TestCase
{
    use RefreshDatabase;

    protected $owners = [
        Event::class,
        BridesBest::class,
		Carousel::class,
		VIP::class,
		Album::class
    ];

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAssignImageToOwners()
    {
        $album = factory(Album::class)->create();
        foreach ($this->owners as $o) {
            // the original image (attached to an album)
            $image = factory(Image::class)->create([
                'imageable_id' => $album->id
            ]);

            // the owner
            $owner = factory($o)->create();

            // set them to the owners
            $image->addTo($owner);

			// assert for each owner's new image existence
            $owner = $o::find(1);
            if ($owner->images) {
                $this->assertNotNull($owner->images);
            } else {
                $this->assertNotNull($owner->image);
            }
        }

        $images = Image::all();

        // We don't lose our original images
        $this->assertCount(count($this->owners), $album->images);
        $this->assertCount(count($this->owners) * 2, $images);
    }
}
