<?php

namespace Tests\Browser\Auth;

use App\User;
use App\Setting;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SEOPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserCanUpdateSEOTest extends Authentication
{
    use DatabaseMigrations;

    public function testUsersCanUpdateSEO()
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
