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
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'peserta12345@gmail.com')
                    ->type('password', 'peserta12345')
                    ->press('Login')
                    ->assertPathIs('/dashboard-peserta')
                    ->assertSee('Selamat Datang!')
                    ->waitFor('.card') 
                    ->scrollTo('.card') 
                    ->with('.card', function ($card) {
                        $card->assertPresent('@enroll-button-1') 
                              ->scrollTo('@enroll-button-1') 
                              ->pause(1000) 
                              ->click('@enroll-button-1'); 
                    })
                    ->type('nik', '1234567890123456') 
                    ->attach('ktm', __DIR__.'/files/ktm example.png')
                    ->attach('ktp', __DIR__.'/files/ktp example.png') 
                    ->press('Daftar Pelatihan') 
                    ->assertPathIs('/dashboard-peserta'); 
        });
    }}