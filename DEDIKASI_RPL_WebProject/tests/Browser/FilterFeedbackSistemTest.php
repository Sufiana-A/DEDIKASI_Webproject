<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FilterFeedbackSistemTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group filterFeedbackSistem
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback-sistem')
                    ->select('timestamp_filter', '2_bulan')
                    ->press('Filter')
                    ->assertPathIs('/filter-feedback-sistem');
        });
    }
}
