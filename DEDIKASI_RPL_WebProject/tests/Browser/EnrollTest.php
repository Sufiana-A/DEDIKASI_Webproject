<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EnrollTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group enroll
     */
    public function testEnrollButton(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard-peserta')
                    ->assertSee('Selamat Datang!')
                    ->with('.card', function ($card) {
                        $card->click('@enroll-button-1') // Use the appropriate course id here
                              ->assertPathIs('/enroll-pelatihan/1/1'); // Adjust the path based on your application's route
                    });
        });
    }}