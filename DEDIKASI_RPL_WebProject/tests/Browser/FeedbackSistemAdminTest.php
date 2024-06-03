<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FeedbackSistemAdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *  @group feedbackAdmin
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard-admin')
                    ->visit('/feedback-sistem')
                    ->assertSee('Daftar Feedback Untuk Sistem');
    
        });
    }
}
