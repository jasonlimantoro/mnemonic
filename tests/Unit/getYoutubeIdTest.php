<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class getYoutubeIdTest extends TestCase
{
    public function testGetYoutubeId()
    {
		$actual = '2qDIwu5lJgs';
		$url = 'https://www.youtube.com/watch?v=' . $actual;
		$id = getYoutubeId($url);

		$this->assertEquals($actual, $id);
    }
}
