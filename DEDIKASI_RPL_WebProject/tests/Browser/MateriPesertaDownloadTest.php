<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MateriPesertaDownloadTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group materidownloadpeserta
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
                    ->clickLink('List Pelatihan') 
                    ->assertPathIs('/peserta-pelatihan')
                    ->assertSee('Pelatihan Saya')
                    ->click('@view-materi-button-CN003') 
                    ->assertPathIs('/peserta-view-materi/CN003')
                    ->click('@download-materi-button-RPL-02');
        });
    }
}