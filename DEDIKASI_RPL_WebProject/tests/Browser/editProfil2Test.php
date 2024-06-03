<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class editProfil2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editProfil2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/profile-peserta-edit')
                    ->type('no_hp', '81298159010')
                    ->type('password', 'Abcd@13579')
                    ->type('password_confirm', 'Abcd@13579')
                    ->press('Update')
                    ->assertPathIs('/profile-peserta-edit');
        });
    }
}
