<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\admin;
use App\Models\peserta;
use App\Models\Pelatihan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        admin::factory()->create([
            'first_name'    => 'Alifran',
            'last_name'     => 'Alifran',
            'tanggal_lahir' => '17/10/1990',
            'nip'           => '1203214056',
            'no_hp'         => '087877668899',
            'email'         => 'hihihi@gmail.com',
            'password'      => Hash::make('password'),
            'foto_admin'    => ''
        ]);

        peserta::factory(15)->create();
        
        Pelatihan::factory()->create([
            'id'                    => 1,
            'nama_pelatihan'        => 'Belajar Laravel',
            'kategori_pelatihan'    => 'Web Development',
        ]);
    }
}
