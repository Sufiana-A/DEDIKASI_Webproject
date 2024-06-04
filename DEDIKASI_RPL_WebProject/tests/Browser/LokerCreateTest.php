<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LokerCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group lokercreate
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Welcome to Dashboard')
                    ->type('email', 'adminsatu@gmail.com')
                    ->type('password', 'adminsatu')
                    ->press('Login')
                    ->assertPathIs('/dashboard-admin')
                    ->assertSee('Total Peserta Saat Ini')
                    ->clickLink('Kelola Lowongan Kerja') 
                    ->assertPathIs('/list-loker')
                    ->assertSee('LIST LOWONGAN KERJA')
                    ->click('.btn-primary .fas.fa-plus') 
                    ->assertPathIs('/create-loker')
                    ->assertSee('Tambah Lowongan Baru')
                    ->type('posisi', 'Project Management')
                    ->type('nama_perusahaan', 'Shopee')
                    ->select('tipe_pekerjaan', 'Full-Time')
                    ->select('kota', 'DKI Jakarta')
                    ->type('kategori_pekerjaan', 'Software Development')
                    ->type('deskripsi_loker', 'Minimal S1 Engineering atau Business Management, berpengalaman 2 tahun di bidang terkait.')
                    ->type('link_loker', 'https://careers.shopee.sg/job-detail/J00209396/1?channel=10001')
                    ->press('Tambah')
                    ->assertPathIs('/list-loker')
                    ->assertSee('LIST LOWONGAN KERJA')
                    ->with('.table', function ($table) {
                        $table->assertSee('Project Management')
                              ->assertSee('Shopee')
                              ->assertSee('Full-Time')
                              ->assertSee('Software Development');
                    });
        });
    }
}

        