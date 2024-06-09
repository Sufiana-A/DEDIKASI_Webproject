<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutMentorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logoutPeserta
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'nafilaalfirahma@gmail.com')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertPathIs('/dashboard-peserta')
                    ->waitFor('@user-dropdown')
                    ->scrollIntoView('@user-dropdown') // Scroll to the dropdown
                    ->mouseover('@user-dropdown')
                    ->waitFor('@logout-link')
                    ->scrollIntoView('@logout-link') // Scroll to the logout link
                    ->click('@logout-link');
        });
    }
}
