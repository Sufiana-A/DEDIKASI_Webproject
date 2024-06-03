<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewListPelatihan1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group viewListPelatihan1
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'dpmarthin@gmail.com')
                    ->type('password', 'abogoboga')
                    ->press('Login')
                    ->assertPathIs('/dashboard-peserta')
                    ->assertSee('Management')
                    ->clickLink('List Pelatihan')
                    ->assertPathIs('/peserta-pelatihan');
        });
    }
}
