<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Register')
                    ->type('first_name', 'Peserta')
                    ->type('last_name', 'Satu')
                    ->type('tanggal_lahir', '23/01/1995')
                    ->type('nim', '1202212345')
                    ->type('jurusan', 'Teknik Informatika')
                    ->type('angkatan', '2012')
                    ->type('no_hp', '08119787859')
                    ->type('email', 'peserta12345@gmail.com')
                    ->type('password', 'peserta12345')
                    ->type('password_confirmation', 'peserta12345')
                    ->press('Register')
                    ->assertPathIs('/login');
        });
    }
}
