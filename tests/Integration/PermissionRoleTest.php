<?php

namespace Tests\Integration;

use App\Role;
use App\PermissionRole;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionRoleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        factory(PermissionRole::class)->create([
            'action' => [
                'create' => false,
                'read' => true,
                'update' => true,
                'delete' => false
            ]
        ]);
    }

    public function testGetAllowableActions()
    {
        $first = PermissionRole::first();
        $role = Role::find($first->role_id);

        $allowables = $role->allowables();

        $diff = array_diff($allowables, ['read', 'update']);

        $this->assertEmpty($diff);
    }

    public function testGetNotAllowableActions()
    {
        $first = PermissionRole::first();
        $role = Role::find($first->role_id);

        $notAllowables = $role->notAllowables();

        $diff = array_diff($notAllowables, ['create', 'delete']);

        $this->assertEmpty($diff);
    }
}
