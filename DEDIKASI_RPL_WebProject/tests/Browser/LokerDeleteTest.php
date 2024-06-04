<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LokerDeleteTest extends DuskTestCase
{
     /**
     * A Dusk test example.
     * @group lokerdelete
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'adminsatu@gmail.com')
                    ->type('password', 'adminsatu')
                    ->press('Login')
                    ->assertPathIs('/dashboard-admin')
                    ->assertSee('Total Peserta Saat Ini')
                    ->clickLink('Kelola Lowongan Kerja') 
                    ->assertPathIs('/list-loker')
                    ->assertSee('LIST LOWONGAN KERJA')
                    ->click('@delete-loker-button-Shopee') 
                    ->waitFor('#delete', 10) 
                    ->within('#delete', function ($modal) {
                        $modal->press('Delete'); 
                    })
                    ->waitForLocation('/list-loker', 10)
                    ->assertPathIs('/list-loker')
                    ->assertDontSee('Shopee');
        });
    }
}

