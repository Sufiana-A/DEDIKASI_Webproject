<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssignmentEditTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group assignmentedit
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
                    ->click('@edit-assignment-button-A01C001') 
                    ->type('title', 'Tugas 1 EAI (update)')
                    ->script([
                        "$('#description').summernote('coba', $('#description').val());" 
                    ])
                    ->press('Perbarui')
                    ->visit('/list-assignment');
        });
    }
}
