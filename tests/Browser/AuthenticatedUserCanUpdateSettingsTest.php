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
		$data = [
			'admin_email' => 'admin@example.com',
			'site_title' => 'Mnemonic',
			'site_description' => 'Some Awesome Description',
			'contact' => [
				'email' => 'Janedoe@example.com',
				'phone' => '298-4298-278',
				'mobile' => '9487-39847-38',
				'address' => 'Oklahoma Street Avenue no 26',
				'region' => 'North Carolina',
				'city' => 'Chicago',
				'country' => 'USA',
				'zip_code' => '294982',
			]
		];

		$user = factory(User::class)->create();
        $this->browse(function (Browser $browser) use ($user, $data) {
			$browser->loginAs($user)
					->visit(new SettingsPage)
					->fill($data)
					->press('Update')
					->waitForText('successfully')
					->assertSee('successfully')
					->assertRouteIs('settings.edit')
					->assertUpdated($data);
		});
    }
}
