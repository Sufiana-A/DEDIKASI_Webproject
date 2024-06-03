<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewCourseMentor2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group viewCourseMentor2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard-mentor')
                    ->assertSee('Daftar Course yang diajar');
        });
    }
}
