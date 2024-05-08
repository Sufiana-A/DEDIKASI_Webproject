<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\peserta>
 */
class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'tanggal_lahir'  => $this->faker->date(),
            'nim' => rand(1111111111, 9999999999),
            'jurusan' => $this->faker->randomElement(['Teknik Informatika', 'Sistem Informasi']),
            'angkatan' =>  date('Y'),
            'no_hp' => '081234567891',
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'foto_peserta' => ''
        ];
    }
}
