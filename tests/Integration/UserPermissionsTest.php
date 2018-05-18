<?php

namespace Tests\Integration;

use App\User;
use App\Role;
use App\Permission;
use App\PermissionRole;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPermissionTest extends TestCase
{
    use RefreshDatabase;

    public function testGetPermissible()
    {
        $admin = factory(Role::class)->states('admin')->create();

        $couplePermission = factory(Permission::class)->states('couple', 'incomplete')->create();
        $postPermission = factory(Permission::class)->states('post', 'complete')->create();

        $admintoCouplePermissions = PermissionRole::create([
            'permission_id' => $couplePermission->id,
            'role_id' => $admin->id,
            'action' => [
                'read' => true,
                'update' => false,
            ]
        ]);

        $admintoPostPermissions = PermissionRole::create([
            'permission_id' => $postPermission->id,
            'role_id' => $admin->id,
            'action' => [
                'create' => true,
                'read' => true,
                'update' => false,
                'delete' => false
            ]
        ]);

        $user = factory(User::class)->create();

        $user->role()->associate($admin);
        $user->save();

        $this->assertEmpty(array_diff(
            $user->permissibles('couple'),
            ['read']
        ));

        $this->assertEmpty(array_diff(
            $user->permissibles('post'),
            ['create', 'read']
        ));
    }
}
