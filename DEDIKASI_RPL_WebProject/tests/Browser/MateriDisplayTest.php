<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MateriDisplayTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group materidisplay
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'mentorsatu@gmail.com')
                    ->type('password', 'mentorsatu')
                    ->press('Login')
                    ->assertPathIs('/mentor')
                    ->clickLink('Kelola Materi') 
                    ->assertPathIs('/list-materi')
                    ->assertSee('LIST MATERI');
                    
        });
    }}
