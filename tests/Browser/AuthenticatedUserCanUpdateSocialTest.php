<?php

namespace Tests\Browser;

use App\User;
use App\Image;
use App\Setting;
use Tests\DuskTestCase;
use SettingsTableSeeder;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SocialPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticatedUserCanUpdateSocialTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user);
        });
    }

    public function testAuthenticatedUsersCanUpdateSocial()
    {
		$data = [
			'google_plus' =>  'https://plus.google.com/1',
			'facebook' => 'https://facebook.com/myaccount',
			'instagram' => 'https://instagram.com/myaccount',
			'youtube' => 'https://youtube.com/myaccount'
		];

        $this->browse(function (Browser $browser) use ($data) {
			$browser->visit(new SocialPage)
                    ->fill($data)
                    ->press('Update')
                    ->waitForText('successfully', 2)
                    ->assertRouteIs('socials.edit')
                    ->assertUpdated($data);
		});
    }
}
