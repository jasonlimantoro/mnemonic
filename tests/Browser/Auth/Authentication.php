<?php

namespace Tests\Browser\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\Setting;
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
