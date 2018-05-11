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
	
	public function fill(Browser $browser, array $data)
	{
		$browser->type('admin_email', $data['admin_email'])
				->type('site_title', $data['site_title'])
				->type('site_description', $data['site_description'])
				->type('contact_email', $data['contact']['email'])
				->type('contact_phone', $data['contact']['phone'])
				->type('contact_mobile', $data['contact']['mobile'])
				->type('contact_address', $data['contact']['address'])
				->type('contact_region', $data['contact']['region'])
				->type('contact_city', $data['contact']['city'])
				->type('contact_country', $data['contact']['country'])
				->type('contact_zip_code', $data['contact']['zip_code']);
	}
	public function assertUpdated(Browser $browser, array $data)
	{
		$browser->assertInputValue('admin_email', $data['admin_email'])
				->assertInputValue('site_title', $data['site_title'])
				->assertInputValue('site_description', $data['site_description'])
				->assertInputValue('contact_email', $data['contact']['email'])
				->assertInputValue('contact_phone', $data['contact']['phone'])
				->assertInputValue('contact_mobile', $data['contact']['mobile'])
				->assertInputValue('contact_address', $data['contact']['address'])
				->assertInputValue('contact_region', $data['contact']['region'])
				->assertInputValue('contact_city', $data['contact']['city'])
				->assertInputValue('contact_country', $data['contact']['country'])
				->assertInputValue('contact_zip_code', $data['contact']['zip_code']);
		
	}
}
