<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssignmentViewPeserta extends DuskTestCase
{
    /**
     * @group assignmentP
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'nafilaalfirahma@gmail.com')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertPathIs('/dashboard-peserta')
                    ->clickLink('List Pelatihan') 
                    ->assertPathIs('/peserta-pelatihan')
                    ->assertSee('Pelatihan Saya')
                    ->click('@view-assignment-button-CN002') 
                    ->assertPathIs('/peserta-view-assignment/CN002');
        });
    }
}
