<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class RolesPage extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return route('roles.index');
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
	public function checkPermissions($browser, $permissions)
	{
		foreach ($permissions as $permission) {
			$browser->check($permission);
		}
	}

	public function assertCheckedPermissions($browser, $permissions)
	{
		foreach ($permissions as $permission) {
			$browser->assertChecked($permission);
		}
	}
}
