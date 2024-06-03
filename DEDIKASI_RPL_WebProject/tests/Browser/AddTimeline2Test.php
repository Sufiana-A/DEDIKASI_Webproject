<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddTimeline2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group addTimeline2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/timeline')
                    ->assertSee('Timelines')
                    ->press('@add-timeline')
                    ->assertSee('Tambah Timeline')
                    ->select('Pelatihan', 'Pemodelan Proses Bisnis')
                    ->type('Tugas', 'UTS')
                    ->type('Deadline', '')
                    ->select('Status', 'IN PROGRESS')
                    ->press('Save');
        });
    }
}
