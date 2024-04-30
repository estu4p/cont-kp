<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriPenilaian;
use SebastianBergmann\Comparator\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SubKategoriPenilaian as ModelsSubKategoriPenilaian;

class SubKategoriPenilaian extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            ModelsSubKategoriPenilaian::create([
                'kategori_id' => KategoriPenilaian::inRandomOrder()->first()->id,
                'nama_sub_kategori' => $faker->randomElement(['Desain Thinking', 'Pemahaman Penerapan Desain']),
            ]);
        }
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPenilaian::class, 'kategori_id');
    }
}
