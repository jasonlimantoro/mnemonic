<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\AdminPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticationTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Redirection if guess is visiting the admin page.
     *
     * @return void
     */
    public function testAuth()
    {
        $user = factory(User::class)->create();
        $this->browse(function ($first, $second, $third) use ($user) {
            // prompted to log in
            $first->visit(new AdminPage)
                  ->assertRouteIs('login');

            // successfully login
            $second->loginAs($user)
                 ->visit(new AdminPage)
                 ->assertRouteIs('admin')
                 ->assertSee('Dashboard')
                 ->assertSee($user->name);

            // successfully logout
            $third->loginAs($user)
                  ->visit(new AdminPage)
                  ->click('@profile-toggle')
                  ->click('@logout-link')
                  ->assertRouteIs('front.index');
        });
    }
}
