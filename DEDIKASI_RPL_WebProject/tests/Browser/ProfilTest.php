<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfilTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group profil
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/profile-peserta')
                    ->assertSee('Profil Saya');
        });
    }
}
