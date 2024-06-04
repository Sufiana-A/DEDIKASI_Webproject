<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditTimeline1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editTimeline1
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
                    ->assertSee('Pengembangan Aplikasi Website')
                    ->press('@edit-timeline')
                    ->assertSee('Edit Timeline')
                    ->select('title', 'Rekayasa Perangkat Lunak')
                    ->waitFor('#class', 5)
                    ->waitFor('#description', 5)
                    ->type('tugas', 'Tugas Besar')
                    ->type('deadline', '2024-06-04T11:59')
                    ->select('status', 'IN PROGRESS')
                    ->press('Update');
        });
    }
}
