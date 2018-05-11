<?php

namespace Tests\Browser;

use App\User;
use App\Setting;
use Tests\DuskTestCase;
use SettingsTableSeeder;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\DB;
use Tests\Browser\Pages\SettingsPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticatedUserCanUpdateSettingsTest extends DuskTestCase
{
	use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAuthenticatedUseCanUpdateSettings()
    {
		(new SettingsTableSeeder)->run();

		$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) use ($user) {
			$browser->loginAs($user)
					->visit(new SettingsPage)
					->fill()
					->press('Update')
					->waitForText('successfully')
					->assertSee('successfully')
					->assertRouteIs('settings.edit');
		});
		$this->assertDatabaseHas('settings', [
			'value' => 'admin@example.com',
			'value' => 'Mnemonic'
		]);
    }
}
