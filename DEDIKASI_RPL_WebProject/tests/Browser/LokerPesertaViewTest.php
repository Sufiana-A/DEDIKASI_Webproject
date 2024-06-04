<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LokerPesertaViewTest extends DuskTestCase
{
     /**
     * A Dusk test example.
     * @group lokerviewpeserta
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'arinratnadewi@gmail.com')
                    ->type('password', 'arinratnadewi')
                    ->press('Login')
                    ->assertPathIs('/dashboard-peserta')
                    ->clickLink('Informasi Lowongan Kerja')
                    ->assertPathIs('/peserta-view-loker')
                    ->assertSee('Daftar Lowongan Pekerjaan')
                    ->click('@loker-view-button-1');
                    
        });
    }
}
