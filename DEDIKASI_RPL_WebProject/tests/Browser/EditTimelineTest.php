<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditTimelineTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editTimeline
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
