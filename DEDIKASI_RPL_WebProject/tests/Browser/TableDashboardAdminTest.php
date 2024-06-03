<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TableDashboardAdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group tableDashboardAdmin
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard-admin')
                    ->assertSee('Daftar Jumlah Peserta Pelatihan');
        });
    }
}
