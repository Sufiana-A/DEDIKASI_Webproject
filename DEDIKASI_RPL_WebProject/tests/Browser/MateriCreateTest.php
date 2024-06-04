<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MateriCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group matericreate
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
                    ->type('judul_materi', 'Materi 07 - Testing')
                    ->type('deskripsi_materi', 'Mempelajari Software Testing')
                    ->attach('link_terkait', __DIR__.'/files/Materi Example.pdf') // Make sure to have a sample file
                    ->press('Tambah')
                    ->assertPathIs('/list-materi')
                    ->assertSee('LIST MATERI')
                    ->with('.table', function ($table) {
                        $table->assertSee('CN003: RPL')
                              ->assertSee('RPL-07')
                              ->assertSee('Materi 07 - Testing')
                              ->assertSee('Mempelajari Software Testing');
                    });
        });
    }
}

        