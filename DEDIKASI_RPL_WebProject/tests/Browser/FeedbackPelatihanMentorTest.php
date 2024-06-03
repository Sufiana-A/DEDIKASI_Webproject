<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FeedbackPelatihanMentorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group feedbackMentor
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard-mentor')
                    ->visit('/feedback-mentor')
                    ->assertSee('Daftar Feedback Untuk Mentor');
    
        });
    }
}
