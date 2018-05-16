<?php

namespace Tests\Integration;

use App\Role;
use App\Permission;
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

    public function testGetAllowableActionsFromRole()
    {
        $first = PermissionRole::first();
        $role = Role::find($first->role_id);
        $permissions = Permission::find($first->permission_id);

        $allowables = $role->allowables($permissions->name);

        $diff = array_diff($allowables, ['read', 'update']);

        $this->assertEmpty($diff);
    }

    public function testGetNotAllowableActionsFromRole()
    {
        $first = PermissionRole::first();
        $role = Role::find($first->role_id);
        $permissions = Permission::find($first->permission_id);

        $notAllowables = $role->notAllowables($permissions->name);

        $diff = array_diff($notAllowables, ['create', 'delete']);

        $this->assertEmpty($diff);
    }

    public function testGetAllowableActionsFromPermission()
    {
        $first = PermissionRole::first();

        $permission = Permission::find($first->permission_id);

        $role = Role::find($first->role_id);

        $actionables = $permission->actionables($role->name);

        $this->assertEmpty(array_diff($actionables, ['read', 'update']));
    }

    public function testGetNotAllowableActionsFromPermission()
    {
        $first = PermissionRole::first();

        $permission = Permission::find($first->permission_id);

        $role = Role::find($first->role_id);

        $notActionables = $permission->notActionables($role->name);

        $this->assertEmpty(array_diff($notActionables, ['create', 'delete']));
    }
}
