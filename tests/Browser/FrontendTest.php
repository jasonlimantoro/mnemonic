<?php

namespace Tests\Browser;

use App\Models\Post;
use App\VIP;
use PagesTableSeeder;
use ImagesTableSeeder;
use VIPTableSeeder;
use CarouselsTableSeeder;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\Browser\Pages\AboutPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FrontEndTest extends DuskTestCase
{
	use DatabaseMigrations;

	public function initializePage()
	{
		(new PagesTableSeeder)->run();
	}

    public function testHomePage()
    {
		$this->initializePage();

		(new CarouselsTableSeeder)->run();

		factory(Post::class, 20)->create(['page_id' => 1]);

		factory(Post::class, 15)->create(['page_id' => 2]);

        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
					->assertSee('Archives')
					->assertSee('Read More');

		});
	}

    public function testAboutPage()
    {
		$this->initializePage();

		(new VIPTableSeeder)->run();
		$groom = VIP::groom();
		$bride = VIP::bride();

        $this->browse(function (Browser $browser) use($groom, $bride) {
			$browser->visit(new AboutPage)
					->assertSee($groom->name)
					->assertSee($bride->name);
		});
	}

}
