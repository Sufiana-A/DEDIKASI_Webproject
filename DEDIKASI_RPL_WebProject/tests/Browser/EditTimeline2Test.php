<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditTimeline2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editTimeline2
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
                    ->clickLink('Timeline')
                    ->assertPathIs('/timeline')
                    ->assertSee('Pemodelan Proses Bisnis')
                    ->press('@edit-timeline')
                    ->assertSee('Edit Timeline')
                    ->select('title', 'Rekayasa Proses Bisnis')
                    ->waitFor('#class', 5)
                    ->waitFor('#description', 5)
                    ->type('tugas', 'Tugas')
                    ->type('deadline', '')
                    ->select('status', 'IN PROGRESS')
                    ->press('Update');
        });
    }
}
