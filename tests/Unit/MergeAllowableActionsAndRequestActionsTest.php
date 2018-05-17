<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MergeAllowableActionsAndRequestActionsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMergeReceivedAndRequestActions()
    {
		$actions = [
			'create', 'read', 'update', 'delete'
		];
		$received = [
			'create' => 'on',
			'delete' => 'on'
		];

		$actionables = merge_array_to_assoc_array($received, $actions);

		$this->assertEquals([
			'create'=> true,
			'read' => false,
			'update' => false,
			'delete' => true
		], $actionables);

    }
}
