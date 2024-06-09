<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssignmentCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group assignmentcreate
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
                    ->click('.btn-primary .fas.fa-plus')
                    ->assertPathIs('/create-assignment')
                    ->select('pelatihan', 'CN002')
                    ->type('id_tugas', 'A02C002')
                    ->type('title', 'Tugas 1 EAI')
                    ->script([
                        "$('#addition').summernote('Konsep Mikroservis', $('#addition').val());" 
                    ])
                    ->waitFor('input[type="file"][name="addition"]', 10)
                    ->attach('input[type="file"][name="addition"]', __DIR__.'/filetest/microservice.png');
                    // ->attach('addition', __DIR__.'/filetest/microservice.png') ;
                    // ->press('Simpan');
                    // ->assertPathIs('/list-assignment')
                    // ->assertSee('Assignments')
                    // ->with('.table', function ($table) {
                    //     $table->assertSee('CN002: EAI')
                    //           ->assertSee('A02C002')
                    //           ->assertSee('Tugas 1 EAI')
                    //           ->assertSee('Konsep Mikroservis');
                    // });
        });
    }
}
