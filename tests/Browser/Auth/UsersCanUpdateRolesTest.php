<?php

namespace Tests\Browser\Auth;

use App\Role;
use App\User;
use App\Permission;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\RolesPage;
use RolesTableSeeder;
use PermissionsTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersCanUpdateRolesTest extends DuskTestCase
{
	use DatabaseMigrations;

    public function testUpdateRolesTest()
    {
		factory(Permission::class)->states('carousel images', 'complete')->create();
		factory(Permission::class)->states('couple', 'incomplete')->create();
		factory(Permission::class)->states('user', 'complete')->create();

		$adminRole = factory(Role::class)->states('admin')->create();
		$authorRole = factory(Role::class)->states('author')->create();

		$user = factory(User::class)->create();
		$user->role()->associate($adminRole);
		$user->save();

		$permissions = [
			'permission[1][create]',
			'permission[2][update]',
			'permission[3][create]',
			'permission[3][read]',
			'permission[3][update]',
			'permission[3][delete]',
		];

        $this->browse(function (Browser $browser) use ($user, $permissions) {

			$browser->loginAs($user)
					->visit(new RolesPage)
					->clickLink('author')
					->assertRouteIs('roles.edit', ['role' => 2])
					->checkPermissions($permissions)

					->press('Update Role')
					->assertSee('successfully')

					->assertCheckedPermissions($permissions);
		});

    }
}
