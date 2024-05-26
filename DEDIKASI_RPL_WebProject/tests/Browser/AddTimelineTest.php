<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddTimelineTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group addTimeline
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/timeline')
                    ->assertSee('Timelines')
                    ->press('@add-timeline')
                    ->assertSee('Tambah Timeline')
                    ->select('Pelatihan', 'Pengembangan Aplikasi Website')
                    ->type('Tugas', 'UAS')
                    ->type('Deadline', '2024-06-04T11:59')
                    ->select('Status', 'IN PROGRESS')
                    ->press('Save');
        });
    }
}
