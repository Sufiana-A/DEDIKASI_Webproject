<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FilterFeedbackMentorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group filterFeedbackMentor
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback-mentor')
                    ->select('timestamp_filter', '2_bulan')
                    ->press('Filter')
                    ->assertPathIs('/filter-feedback-mentor');
        });
    }
}
