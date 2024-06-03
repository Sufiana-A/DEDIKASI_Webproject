<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UnenrollListPelatihan2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group unenrollListPelatihan2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/peserta-pelatihan')
                    ->assertSee('Alpro')
                    ->press('Unenroll')
                    ->assertSee('Apakah anda yakin mau unenroll?')
                    ->press('Yakin');
        });
    }
}
