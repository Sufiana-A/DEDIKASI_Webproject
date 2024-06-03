<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewJumlahPesertaMentor1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group viewJumlahPesertaMentor1
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'dyom@gmail.com')
                    ->type('password', 'dyomentor123')
                    ->press('Login')
                    ->assertPathIs('/dashboard-mentor')
                    ->assertSee('Jumlah Peserta yang Diajar');
        });
    }
}
