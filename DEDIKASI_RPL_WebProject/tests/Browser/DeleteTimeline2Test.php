<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteTimeline2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group deleteTimeline2
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
                    ->clickLink('Timeline')
                    ->assertPathIs('/timeline')
                    ->assertSee('Rekayasa Proses Bisnis')
                    ->press('@delete-timeline')
                    ->waitFor('#delete', 10) 
                    ->assertSee('Apakah anda yakin mau hapus?')
                    ->press('Yakin');
        });
    }
}
