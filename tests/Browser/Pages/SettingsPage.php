<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class SettingsPage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return route('settings.edit');
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        // $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
	}
	
	public function fill(Browser $browser)
	{
		$browser->type('admin_email', 'admin@example.com')
				->type('site_title', 'Mnemonic')
				->type('site_description', 'Some Awesome Description')
				->type('contact_email', 'janedoe@example.com')
				->type('contact_phone', '29874-2784')
				->type('contact_mobile', '2787-2728')
				->type('contact_address', 'Oklahoma Street Ave no 26')
				->type('contact_region', 'North Carolina')
				->type('contact_city', 'Chicago')
				->type('contact_country', 'USA')
				->type('contact_zip_code', '298749');
	}
}
