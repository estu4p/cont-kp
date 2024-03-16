<?php

namespace Database\Seeders;

use App\Models\KategoriPenilaian;
use App\Models\SubKategoriPenilaian as ModelsSubKategoriPenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKategoriPenilaian extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            ModelsSubKategoriPenilaian::create([
                'kategori_id' => KategoriPenilaian::inRandomOrder('id')->first()->id,
                'nama_sub_kategori' => $faker->randomElement(['Desain Thinking', 'Pemahaman Penerapan Desain']),
            ]);
        }
    }
}
