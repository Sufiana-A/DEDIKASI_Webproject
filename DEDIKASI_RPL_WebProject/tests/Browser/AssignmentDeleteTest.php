<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssignmentDeleteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group assignmentdelete
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'mentor1@gmail.com')
                    ->type('password', 'adminsatu')
                    ->press('Login')
                    ->assertPathIs('/mentor')
                    ->clickLink('Assignment') 
                    ->assertPathIs('/list-assignment')
                    ->assertSee('Assignments')
                    ->click('@delete-assignment-button-A01C001') 
                    ->waitFor('#delete', 10) 
                    ->within('#delete', function ($modal) {
                        $modal->press('Delete'); 
                    })
                    ->waitForLocation('/list-assignment', 10) 
                    ->assertPathIs('/list-assignment')
                    ->assertDontSee('A01C001'); 
        });
    }
}
