<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewListTimeline2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group viewListTimeline2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/timeline')
                    ->assertSee('Timeline Saya');
        });
    }
}
