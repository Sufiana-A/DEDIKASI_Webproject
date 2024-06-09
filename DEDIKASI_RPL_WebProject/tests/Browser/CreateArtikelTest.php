<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateArtikelTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group createArtikel
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'admin1@gmail.com')
                    ->type('password', 'mentorsatu')
                    ->press('Login')
                    ->assertPathIs('/dashboard-admin')
                    ->assertSee('Total Peserta Saat Ini')
                    ->clickLink('Artikel') 
                    ->assertPathIs('/list-artikel')
                    ->assertSee('ARTIKEL')
                    ->click('.btn-primary .fas.fa-plus') 
                    ->assertPathIs('/add-artikel')
                    ->assertSee('Buat Artikel')
                    ->type('id_artikel', 'AR007')
                    ->type('judul', 'Artikel Baru')
                    ->type('penulis', 'Nafila All')
                    ->type('waktu', '23112024')
                    ->script([
                        "$('#konten').summernote('Tambah Artikel', $('#konten').val());" 
                    ]);
        });
    }
}