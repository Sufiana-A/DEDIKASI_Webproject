<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MateriDeleteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group materidelete
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'mentorsatu@gmail.com')
                    ->type('password', 'mentorsatu')
                    ->press('Login')
                    ->assertPathIs('/mentor')
                    ->clickLink('Kelola Materi') 
                    ->assertPathIs('/list-materi')
                    ->assertSee('LIST MATERI')
                    ->click('@delete-materi-button-RPL-08') 
                    ->waitFor('#delete', 10) 
                    ->within('#delete', function ($modal) {
                        $modal->press('Delete'); 
                    })
                    ->waitForLocation('/list-materi', 10) 
                    ->assertPathIs('/list-materi')
                    ->assertDontSee('RPL-08'); 
        });
    }
}
       
        