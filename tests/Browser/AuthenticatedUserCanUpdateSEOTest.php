<?php

namespace Tests\Browser;

use App\User;
use App\Setting;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SEOPage;
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

    public function testAuthenticatedUsersCanUpdateSEO()
    {
        $data = [
            'meta_title' => 'Some Meta Title',
            'meta_description' => 'Some meta description for SEO',
            'g_script' => 'Some Analytics Script',
        ];

        $this->browse(function (Browser $browser) use ($data) {
			$browser->visit(new SEOPage)
                    ->fill($data)
                    ->press('Update')
                    ->waitForText('successfully', 2)
                    ->assertRouteIs('seo.edit')
                    ->assertUpdated($data);
        });
    }
}
