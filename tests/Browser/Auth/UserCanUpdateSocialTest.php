<?php

namespace Tests\Browser\Auth;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SocialPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserCanUpdateSocialTest extends Authentication
{
    use DatabaseMigrations;

    public function testUsersCanUpdateSocial()
    {
        $data = [
            'google_plus' => 'https://plus.google.com/1',
            'facebook' => 'https://facebook.com/myaccount',
            'instagram' => 'https://instagram.com/myaccount',
            'youtube' => 'https://youtube.com/myaccount'
        ];

        $this->browse(function (Browser $browser) use ($data) {
            $browser->visit(new SocialPage)
                    ->fill($data)
                    ->press('Update')
                    ->waitForText('successfully', 2)
                    ->assertRouteIs('sitesocial.edit')
                    ->assertUpdated($data);
        });
    }
}
