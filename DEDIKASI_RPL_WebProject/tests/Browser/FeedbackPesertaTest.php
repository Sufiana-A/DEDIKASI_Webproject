<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FeedbackPesertaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group feedbackPeserta
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback-peserta')
                    ->select('tipe_feedback', 'Sistem')
                    ->select('rating', '4')
                    ->type('feedback', 'Maksimalkan fitur nilai agar saya bisa filter mana yang sudah lulus dan belum lulus' )
                    ->press('Submit')
                    ->assertPathIs('/feedback-peserta');
        });
    }
}
