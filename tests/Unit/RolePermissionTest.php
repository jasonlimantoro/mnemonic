<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Role;
use App\Permission;

class RolePermissions extends TestCase
{
	use RefreshDatabase;

	public function setUp()
	{
		parent::setUp();
        $roles = factory(Role::class, 3)
                ->create()
                ->each(function ($r) {
					$p = factory(Permission::class)->make();
					repeat:
					try {
						$p->save();
					} catch (\Illuminate\Database\QueryException $e)
					{
						$p = factory(Permission::class)->make();
						goto repeat;
					}
                    $r->permissions()->attach(
                        $p->id,
                        ['action' => [
                            'create' => 'false',
                            'read' => 'true',
                            'update' => 'true',
                            'delete' => 'false'
                        ]
                        ]
                    );
                });
		
	}

    public function testGetAllowableActions()
    {

		$first = Role::first();

		$allowables = $first->allowables();

		$diff = array_diff($allowables, ['read', 'update']);

		$this->assertEmpty($diff);

	}

    public function testGetNotAllowableActions()
    {

		$first = Role::first();

		$notAllowables = $first->notAllowables();

		$diff = array_diff($notAllowables, ['create', 'delete']);

		$this->assertEmpty($diff);

    }
}
