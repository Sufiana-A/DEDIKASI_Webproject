<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EnrollFalseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group enrollfalse
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'peserta12345@gmail.com')
                    ->type('password', 'peserta12345')
                    ->press('Login')
                    ->assertPathIs('/dashboard-peserta')
                    ->assertSee('Selamat Datang!')
                    ->waitFor('.card') // Wait for the card container to be present
                    ->scrollTo('.card') // Scroll to the card container
                    ->with('.card', function ($card) {
                        $card->assertPresent('@enroll-button-3') // Ensure the enroll button is present
                              ->scrollTo('@enroll-button-3') // Scroll to the button
                              ->pause(1000) // Optional pause to ensure scrolling is complete
                              ->click('@enroll-button-3'); // Use the appropriate course id here
                    })
                    ->type('nik', '1234567890123456') // Fill NIK
                    ->attach('ktm', __DIR__.'/files/ktm example.png') // Path to the KTM file
                    ->press('Daftar Pelatihan') // Submit the form
                    ->pause(1000) // Pause to allow the form validation to trigger
                    ->assertPresent('input:invalid'); // Check for invalid inputs
        });
    }
}
