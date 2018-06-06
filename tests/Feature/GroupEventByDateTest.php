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

    public function testGroupEventByDate()
    {
        // Now (2)
        $first = factory(Event::class, 2)->create([
            'datetime' => now(),
        ]);

        // Yesterday (1)
        $second = factory(Event::class)->create([
            'datetime' => Carbon::now()->subDay()
        ]);

        $grouped = Event::groupByDate();

        $expected = [
            [
                'datetime' => $first->first()->datetime,
                'occurrences' => 2,
            ],
            [
                'datetime' => $second->datetime,
                'occurrences' => 1,
            ],
        ];

        $this->assertEquals($expected, $grouped);
    }

    public function testGetDistinctDate()
    {
        // Now (2)
        $first = factory(Event::class, 2)->create([
            'datetime' => now(),
        ]);

        // Yesterday (1)
        $second = factory(Event::class)->create([
            'datetime' => Carbon::now()->subDay()
        ]);

        $dates = Event::getDistinctDate();

        $expected = [$first->first()->datetime, $second->datetime];

        $this->assertEquals($expected, $dates);
    }

    public function testProcessDistinctDate()
    {
        // today (2)
        $first = factory(Event::class, 2)->create([
            'datetime' => Carbon::today(),
        ]);

        // Yesterday (1)
        $second = factory(Event::class)->create([
            'datetime' => Carbon::yesterday()
        ]);

        $dates = [$first->first()->datetime, $second->datetime];

        $processed = Event::processDistinctDate($dates);

        $expected = [
            $first->first()->datetime => $first->toArray(),
            $second->datetime => [$second->toArray()],
        ];

        // Today (2)
        $this->assertEquals(
            $expected[$first->first()->datetime][0]['id'],
            $processed[$first->first()->datetime][0]['id']
        );
        $this->assertEquals(
            $expected[$first->first()->datetime][1]['id'],
            $processed[$first->first()->datetime][1]['id']
        );

        // Yesterday (1)
        $this->assertEquals(
            $expected[$second->datetime][0]['id'],
            $processed[$second->datetime][0]['id']
        );
    }
}
