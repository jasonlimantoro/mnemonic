<?php

namespace Tests\Integration;

use Tests\TestCase;
use App\User;
use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\PermissionRole;
use App\Permission;

class UserPermissionTest extends TestCase
{
    use RefreshDatabase;

    public function testGetPermissible()
    {
									
		$admin = factory(Role::class)->states('admin')->create();

		$albumPermission = factory(Permission::class)->states('album', 'complete')->create();
		$postPermission = factory(Permission::class)->states('post', 'complete')->create();

		$admintoAlbumPermissions = PermissionRole::create([
			'permission_id' => $albumPermission->id,
			'role_id' => $admin->id,
			'action' => [
				'create' => true,
				'read' => true,
				'update' => true,
				'delete' => true
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
			$user->permissibles('album'), 
			['create', 'read', 'update', 'delete']
		));

		$this->assertEmpty(array_diff(
			$user->permissibles('post'), ['create', 'read']
		));

    }
}
