<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LokerUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group lokerupdate
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
                    ->click('@update-loker-button-Shopee') 
                    ->type('posisi', 'Project and Product Management')
                    ->press('Simpan')
                    ->assertPathIs('/list-loker')
                    ->with('.table', function ($table) {
                        $table->assertSee('Project and Product Management')
                              ->assertSee('Shopee')
                              ->assertSee('Full-Time')
                              ->assertSee('Software Development');
                    });
        });
    }
}
