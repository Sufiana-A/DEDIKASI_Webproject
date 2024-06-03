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
            $browser->visit('/timeline')
                    ->assertSee('Timelines')
                    ->press('@add-timeline')
                    ->assertSee('Tambah Timeline')
                    ->select('Pelatihan', 'Pengembangan Aplikasi Website')
                    ->type('Tugas', 'UAS')
                    ->type('Deadline', '2024-06-30T11:59')
                    ->select('Status', 'IN PROGRESS')
                    ->press('Save');
        });
    }
}
