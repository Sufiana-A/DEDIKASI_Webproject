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
                    ->type('first_name', 'Sufiana')
                    ->type('last_name', 'Arumdita')
                    ->type('tanggal_lahir', '23/01/1995')
                    ->type('nim', '1202212345')
                    ->type('jurusan', 'Teknik Informatika')
                    ->type('angkatan', '2012')
                    ->type('no_hp', '08119787859')
                    ->type('email', 'sufianaarumdita@gmail.com')
                    ->type('password', 'sufianaarumdita')
                    ->type('password_confirmation', 'sufianaarumdita')
                    ->press('Register')
                    ->assertPathIs('/login');
        });
    }
}
