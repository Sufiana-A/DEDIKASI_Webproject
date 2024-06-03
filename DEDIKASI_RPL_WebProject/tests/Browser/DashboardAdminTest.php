<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardAdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group dashboardAdmin
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard-admin')
                    ->assertSee('Total Peserta Saat Ini');
        });
    }
}
