<?php

namespace Tests\Feature;

use App\Event;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupEventByDateTest extends TestCase
{
    use RefreshDatabase;

    public function testGetDistinctDate()
    {
        // Now (2)
        $first = factory(Event::class, 2)->create([
            'datetime' => Carbon::today(),
        ]);

        // Yesterday (1)
        $second = factory(Event::class)->create([
            'datetime' => Carbon::yesterday(),
        ]);

        $dates = Event::process()->getDistinctDate();

        $expected = [$first->first()->datetime, $second->datetime];

        $this->assertEquals($expected, $dates);
    }

    public function testProcessDistinctDate()
    {
        // today (2)
        $first = factory(Event::class, 2)->create([
            'datetime' => Carbon::today(),
        ]);

        $firstPretty = $first->first()->present()->prettyDatetime;

        // Yesterday (1)
        $second = factory(Event::class)->create([
            'datetime' => Carbon::yesterday()
        ]);
        $secondPretty = $second->present()->prettyDatetime;


        $processed = Event::process()->displayEventsGroupByDate();


        $expected = [
            $firstPretty => $first,
            $secondPretty => collect([$second]),
        ];


        // Today (2)
        $this->assertEquals(
            $expected[$firstPretty][0]->id,
            $processed[$firstPretty][0]->id
        );
        $this->assertEquals(
            $expected[$firstPretty][1]->id,
            $processed[$firstPretty][1]->id
        );

        // Yesterday (1)
        $this->assertEquals(
            $expected[$secondPretty]->first()->id,
            $processed[$secondPretty]->first()->id
        );
    }
}
