<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SeleksiUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group seleksiupdate
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'adminsatu@gmail.com')
                    ->type('password', 'adminsatu')
                    ->press('Login')
                    ->waitForLocation('/dashboard-admin')
                    ->assertPathIs('/dashboard-admin')
                    ->assertSee('Total Peserta Saat Ini')
                    ->clickLink('Seleksi Peserta')
                    ->waitForLocation('/seleksi-peserta')
                    ->assertPathIs('/seleksi-peserta')
                    ->assertSee('SELEKSI PESERTA')
                    ->assertPresent('@update-button-3-1')
                    ->click('@update-button-3-1');

            $browser->visit('/detail-seleksi/3/1')
                    ->assertPathIs('/detail-seleksi/3/1')
                    ->assertSee('Detail Peserta');

            // Fill in the form and click the submit button
            $browser->select('status', 'Diterima')
                    ->press('Simpan')
                    ->waitForLocation('/seleksi-peserta')
                    ->assertPathIs('/seleksi-peserta');
        });
    }
}