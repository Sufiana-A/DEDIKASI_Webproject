<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditProfil3Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editProfil3
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/profile-peserta-edit')
                    ->attach('absolutePathToFile', 'photo')
                    ->press('Update')
                    ->assertPathIs('/profile-peserta');
            $browser->visit('/profile-peserta-edit')
                    ->type('email', 'sufianaardita@gmail.com')
                    ->type('no_hp', '81298151009ab')
                    ->press('Update')
                    ->assertPathIs('/profile-peserta-edit');
        });
    }
}
