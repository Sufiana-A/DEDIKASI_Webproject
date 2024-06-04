<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddTimeline1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group addTimeline1
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
                    ->assertSee('Timelines')
                    ->press('@add-timeline')
                    ->assertSee('Tambah Timeline')
                    ->select('title', 'Pengembangan Aplikasi Website')
                    ->waitFor('#class', 5)
                    ->waitFor('#description', 5)
                    ->type('tugas', 'UAS')
                    ->type('deadline', '2024-06-30T11:59')
                    ->select('status', 'IN PROGRESS')
                    ->press('Save');
        });
    }
}
