<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MentorAssignmentAddTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group addAssignmentMentor
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/list-assignment')
                    ->assertSee('ASSIGNMENT LIST')
                    ->press('fas fa-plus')
                    ->assertPathIs('/create-assignment')
                    ->type('id_tugas', 'A001C012')
                    ->type('title', 'Tugas 1: RPL')
                    ->type('description', 'Membuat Project Laravel')
                    ->type('addition', 'tugas1rpl.png')
                    ->press('Simpan')
                    ->assertPathIs('/list-assignment');
        });
    }
}
