<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UnenrollListPelatihan1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group unenrollListPelatihan1
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/peserta-pelatihan')
                    ->assertSee('Algoritma Pemrograman')
                    ->press('Unenroll')
                    ->assertSee('Apakah anda yakin mau unenroll?')
                    ->press('Yakin');
        });
    }
}
