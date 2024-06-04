<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MateriUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group materiupdate
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
                    ->clickLink('Kelola Materi') // Klik 'Seleksi Peserta' di sidebar
                    ->assertPathIs('/list-materi')
                    ->assertSee('LIST MATERI')
                    ->click('@update-materi-button-RPL-07') // Assuming this is the button for adding new Materi
                    ->type('id_materi', 'RPL-08')
                    ->type('judul_materi', 'Materi 08 - Testing')
                    ->press('Simpan')
                    ->assertPathIs('/list-materi')
                    ->assertSee('LIST MATERI')
                    ->with('.table', function ($table) {
                        $table->assertSee('CN003: RPL')
                              ->assertSee('RPL-08')
                              ->assertSee('Materi 08 - Testing')
                              ->assertSee('Mempelajari Software Testing');
                    });
        });
    }
}
