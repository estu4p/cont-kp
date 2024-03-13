<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Mitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            Mahasiswa::create([
                'nama_mahasiswa' => $faker->name,
                'email' => $faker->email,
                'nomor_induk_mahasiswa' => $faker->randomNumber,
                'jurusan' => $faker->randomElement(['Ilmu Komputer', 'Teknik Informatika', 'Sistem Informasi', 'Manajemen Informatika', 'Teknik Elektro']),
                'no_hp' => $faker->phoneNumber,
                'address' => $faker->address,
                'about' => $faker->sentence,
                'mitra_id' => Mitra::inRandomOrder()->first()->id // Mengambil ID mitra secara acak
            ]);
        }
    }
}
