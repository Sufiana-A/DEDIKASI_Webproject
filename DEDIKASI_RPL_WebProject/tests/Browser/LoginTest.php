<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    // ->clickLink('Login')
                    // ->assertPathIs('/login')
                    ->type('email', 'nafilaalfirahma@gmail.com')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertPathIs('/dashboard-peserta');
        });
    }
}
