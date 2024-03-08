<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'nama_lengkap' => $faker->name,
                'nomor_induk_mahasiswa' => $faker->randomNumber,
                'jurusan' => $faker->randomElement(['Ilmu Komputer', 'Teknik Informatika', 'Sistem Informasi', 'Manajemen Informatika', 'Teknik Elektro']),
                'email' => $faker->email,
                'username' => $faker->userName,
                'no_hp' => $faker->phoneNumber,
                'role' => $faker->numberBetween(1, 3),
                'password' => Hash::make('123456'),
            ]);
        }
    }
}
