<?php

namespace Tests\Browser\Auth;

use App\Role;
use App\User;
use App\Setting;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SEOPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Authentication extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
		parent::setUp();
		$admin = factory(Role::class)->states('admin')->create();

		$user = factory(User::class)->create();
		$user->role()->associate($admin);
		$user->save();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user);
        });
    }

}
