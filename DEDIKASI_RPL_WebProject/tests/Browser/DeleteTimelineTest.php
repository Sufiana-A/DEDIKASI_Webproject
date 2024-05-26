<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteTimelineTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group deleteTimeline
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/timeline')
                    ->assertSee('Rekayasa Perangkat Lunak')
                    ->press('@delete-timeline')
                    ->assertSee('Apakah anda yakin mau hapus?')
                    ->press('Yakin');
        });
    }
}
