<?php

namespace Tests\Browser\Auth;

use App\User;
use App\Image;
use App\Setting;
use SettingsTableSeeder;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SettingsPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserCanUpdateSettingsTest extends Authentication
{
    use DatabaseMigrations;

    public function testUsersCanUpdateSettings()
    {
        (new SettingsTableSeeder)->run();
        $data = [
            'admin_email' => 'test@example.com',
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

        $this->browse(function (Browser $browser) use ($data) {
            $browser->visit(new SettingsPage)
                    ->fill($data)
                    ->press('Update')
                    ->waitForText('successfully', 2)
                    ->assertRouteIs('siteinfo.edit')
                    ->assertUpdated($data);
        });
    }

    public function testUsersCanUploadFaviconAndLogo()
    {
        $image = factory(Image::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit(new SettingsPage)
                    ->press('@favicon-upload')
                    ->clickLink('Gallery')
                    ->waitFor('.thumbnail-container')
                    ->click('.thumbnail-container')
                    ->press('Done')

                    ->waitUntilMissing('.thumnail-container')

                    ->press('@logo-upload')
                    ->clickLink('Gallery')
                    ->waitFor('.thumbnail-container')
                    ->click('.thumbnail-container')
                    ->press('Done')

                    ->press('Update')
                    ->waitForText('successfully')
                    ->assertRouteIs('siteinfo.edit');
        });
        $site = Setting::getValueByKey('site-info');
        $expected = (object)[
            'logo' => $image->url_cache,
            'title' => null,
            'contact' => (object) [
                'city' => null,
                'email' => null,
                'phone' => null,
                'mobile' => null,
                'region' => null,
                'address' => null,
                'country' => null,
                'zip_code' => null,
            ],
            'favicon' => $image->url_cache,
            'admin-email' => null,
            'description' => null,
        ];
        $this->assertEquals($expected, $site);
    }
}
