<?php

namespace Tests\Integration;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Role;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    public function testAssignRole()
    {
        $admin = factory(Role::class)->states('admin')->create();
        $author = factory(Role::class)->states('author')->create();
        $user = factory(User::class)->create([
            'role_id' => 2
        ]);

        $user->assignRole('admin');

        $this->assertEquals($admin->id, $user->role_id);
    }

    public function testAssignToDefault()
    {
        $role = factory(Role::class)->states('admin')->create();
		$user = factory(User::class)->create();
		
		$user->role()->associate($role);
		$user->save();

		$user->assignToDefault();
		$user->load('role');

		$this->assertEquals('unassigned', $user->role->name);
		
    }
}
