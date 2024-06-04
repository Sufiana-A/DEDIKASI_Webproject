<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MateriPesertaViewTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group materiviewpeserta
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
                    ->click('@view-materi-button-CN003') // Assuming this is the button for adding new Materi
                    ->assertPathIs('/peserta-view-materi/CN003');
                    
        });
    }}
