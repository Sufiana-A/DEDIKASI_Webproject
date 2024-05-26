<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UnenrollListPelatihanTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group unenrollListPelatihan
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/peserta-pelatihan')
                    ->assertSee('Integrasi Aplikasi Enterprise')
                    ->press('Unenroll')
                    ->assertSee('Apakah anda yakin mau unenroll?')
                    ->press('Yakin');
        });
    }
}
