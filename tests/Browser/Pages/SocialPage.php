<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class SocialPage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return route('sitesocial.edit');
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertUrlIs($this->url());
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
		$browser->type('google_plus', $data['google_plus'])
				->type('facebook', $data['facebook'])
				->type('instagram', $data['instagram'])
				->type('youtube', $data['youtube']);
	}
	public function assertUpdated(Browser $browser, array $data) 
	{
		$browser->assertInputValue('google_plus', $data['google_plus'])
				->assertInputValue('facebook', $data['facebook'])
				->assertInputValue('instagram', $data['instagram'])
				->assertInputValue('youtube', $data['youtube']);
		
	}
}
