<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class SEOPage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return route('siteseo.edit');
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
		$browser->type('meta_title', $data['meta_title'])
				->type('meta_description', $data['meta_description'])
				->type('g_script', $data['g_script']);
	}
	public function assertUpdated(Browser $browser, array $data) 
	{
		$browser->assertInputValue('meta_title', $data['meta_title'])
				->assertInputValue('meta_description', $data['meta_description'])
				->assertInputValue('g_script', $data['g_script']);
		
	}
}
