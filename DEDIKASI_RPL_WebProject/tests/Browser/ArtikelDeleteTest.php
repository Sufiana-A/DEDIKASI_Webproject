<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArtikelDeleteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group artikeldel
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'admin1@gmail.com')
                    ->type('password', 'mentorsatu')
                    ->press('Login')
                    ->assertPathIs('/mentor')
                    ->clickLink('Artikel') 
                    ->assertPathIs('/list-artikel')
                    ->assertSee('Assignments')
                    ->click('@delete-assignment-button-A01C001') 
                    ->waitFor('#delete', 10) 
                    ->within('#delete', function ($modal) {
                        $modal->press('Delete'); 
                    })
                    ->waitForLocation('/list-assignment', 10) 
                    ->assertPathIs('/list-assignment')
                    ->assertDontSee('A01C001'); 
        });
    }
}
