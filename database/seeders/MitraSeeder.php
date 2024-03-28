<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\Mitra;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            Mitra::create([
                'nama_mitra' => $faker->company,
                'deskripsi_mitra' => $faker->sentence,
                'status_absensi' => $faker->randomElement(['Scan QR Code', 'Button']),

            ]);
        }
    }
}
