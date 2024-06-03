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
            $browser->visit('/timeline')
                    ->assertSee('Pemodelan Proses Bisnis')
                    ->press('@edit-timeline')
                    ->assertSee('Edit Timeline')
                    ->select('Pelatihan', 'Rekayasa Proses Bisnis')
                    ->type('Tugas', 'Tugas')
                    ->type('Deadline', '')
                    ->select('Status', 'IN PROGRESS')
                    ->press('Update');
        });
    }
}
