<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sekolah = ['SMA 3', 'UGM', 'UNY', 'UNNES', 'UNDIP'];
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            Sekolah::create([
                'nama_lengkap' => 'Nama Penanggung Jawab Sekolah',
                'sekolah' => $sekolah[$i],
                'email' => $faker->email,
                'no_hp' => '07669865',
                'password' => Hash::make('123456'),
            ]);
        }
    }
}
