<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewListPelatihanTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group viewListPelatihan
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('//dashboard-peserta')
                    ->assertSee('Management')
                    ->clickLink('List Pelatihan')
                    ->assertPathIs('/peserta-pelatihan');
        });
    }
}
