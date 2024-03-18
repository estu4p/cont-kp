<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\KategoriPenilaian as ModelsKategoriPenilaian;

class KategoriPenilaian extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            ModelsKategoriPenilaian::create([
                'divisi_id' => Divisi::inRandomOrder()->first()->id,
                'nama_kategori' => $faker->randomElement(['Pengetahuan', 'Kreativitas']),
            ]);
        }
    }
}
