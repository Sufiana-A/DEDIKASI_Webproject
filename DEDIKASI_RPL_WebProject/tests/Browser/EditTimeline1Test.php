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
            $browser->visit('/timeline')
                    ->assertSee('Pengembangan Aplikasi Website')
                    ->press('@edit-timeline')
                    ->assertSee('Edit Timeline')
                    ->select('Pelatihan', 'Rekayasa Perangkat Lunak')
                    ->type('Tugas', 'Tugas Besar')
                    ->type('Deadline', '2024-06-04T11:59')
                    ->select('Status', 'IN PROGRESS')
                    ->press('Update');
        });
    }
}
