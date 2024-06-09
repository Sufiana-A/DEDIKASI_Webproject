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
                    ->press('.btn .fas.fa-plus')
                    ->assertPathIs('/create-assignment')
                    ->assertSee('Tambahkan Assignment')
                    ->type('id_tugas', 'A001C012')
                    ->type('title', 'Tugas 1: RPL')
                    ->script([
                        "$('#description').summernote('code', $('#description').val());" 
                    ])
                    ->attach('addition', __DIR__.'/filetest/microservice.png');
                    // ->press('Simpan')
                    // ->assertPathIs('/store-assignment');
        });
    }
}
