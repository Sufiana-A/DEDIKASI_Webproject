<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MateriCreateFalseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group matericreatefalse
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
                    ->click('.btn-primary .fas.fa-plus') 
                    ->assertPathIs('/create-materi')
                    ->select('pelatihan', 'CN003') 
                    ->type('id_materi', 'RPL-07')
                    ->press('Tambah')
                    ->pause(1000) 
                    ->assertPresent('input:invalid'); 
        });
    }
}

        