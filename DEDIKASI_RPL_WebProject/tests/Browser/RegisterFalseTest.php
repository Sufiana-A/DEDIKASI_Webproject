<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterFalseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group registerfalse
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Register')
                    ->type('first_name', 'Rizandhi')
                    ->type('last_name', 'Adipradana')
                    ->type('tanggal_lahir', '23/04/1999')
                    ->type('nim', '1202213021')
                    ->type('jurusan', 'Teknik Elektro')
                    ->type('angkatan', '2017')
                    ->type('no_hp', '082122223333')
                    ->type('email', 'rizandhi@gmail.com')
                    ->type('password', '123')
                    ->type('password_confirmation', '123')
                    ->press('Register')
                    ->assertPathIs('/');
        });
    }
}
