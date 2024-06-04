<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UnenrollListPelatihan1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group unenrollListPelatihan1
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
                    ->assertPathIs('/peserta-pelatihan')
                    ->assertSee('Algoritma Pemrograman')
                    ->press('Unenroll')
                    ->waitFor('#delete', 10) 
                    ->assertSee('Apakah anda yakin mau unenroll?')
                    ->press('Yakin');
        });
    }
}
