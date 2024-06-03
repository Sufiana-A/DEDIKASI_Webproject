<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewListPelatihan2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group viewListPelatihan2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/peserta-pelatihan')
                    ->assertSee('Pelatihan Saya');
        });
    }
}
