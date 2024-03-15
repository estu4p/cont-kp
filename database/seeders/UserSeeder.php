<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'nama_lengkap' => $faker->name,
                'nomor_induk' => $faker->unique()->randomNumber(8),
                'jurusan' => $faker->randomElement(['Ilmu Komputer', 'Teknik Informatika', 'Sistem Informasi', 'Manajemen Informatika', 'Teknik Elektro']),
                'email' => $faker->email,
                'username' => $faker->userName,
                'no_hp' => $faker->phoneNumber,
                'barcode' => $faker->ean13(),
                'role_id' => Role::inRandomOrder()->first()->id,
                'password' => Hash::make('123456'),
                'mitra_id' => Mitra::inRandomOrder()->first()->id,
                'alamat' => $faker->address,
                'about' => $faker->sentence,
                'nama_divisi' => Divisi::inRandomOrder()->first()->id
            ]);
        }
    }
}
