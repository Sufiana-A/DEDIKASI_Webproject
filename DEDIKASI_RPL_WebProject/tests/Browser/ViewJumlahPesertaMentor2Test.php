<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewJumlahPesertaMentor2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group viewJumlahPesertaMentor2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard-mentor')
                    ->assertSee('Jumlah Peserta yang Diajar');
        });
    }
}
