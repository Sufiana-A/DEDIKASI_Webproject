<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditProfil1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editProfil
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/profile-peserta')
                    ->visit('/profile-peserta-edit')
                    ->type('email', 'sufiarum44@gmail.com')
                    ->type('no_hp', '81298152509')
                    ->press('Update')
                    ->seePageIs('/profile-peserta');
        
        });
    }
}
