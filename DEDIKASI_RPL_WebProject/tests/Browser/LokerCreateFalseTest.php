<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LokerCreateFalseTest extends DuskTestCase
{
   /**
     * A Dusk test example.
     * @group lokercreatefalse
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'adminsatu@gmail.com')
                    ->type('password', 'adminsatu')
                    ->press('Login')
                    ->assertPathIs('/dashboard-admin')
                    ->assertSee('Total Peserta Saat Ini')
                    ->clickLink('Kelola Lowongan Kerja') 
                    ->assertPathIs('/list-loker')
                    ->assertSee('LIST LOWONGAN KERJA')
                    ->click('.btn-primary .fas.fa-plus') 
                    ->assertPathIs('/create-loker')
                    ->assertSee('Tambah Lowongan Baru')
                    ->type('posisi', 'Project Management')
                    ->press('Tambah')
                    ->pause(1000) 
                    ->assertPresent('input:invalid'); 
        });
    }
}

        