<?php

namespace Database\Seeders;

use App\Models\Penilaian;
use App\Models\SubKategoriPenilaian;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            Penilaian::create([
                'nama_lengkap' => User::inRandomOrder()->first()->id,
                'sub_id' => SubKategoriPenilaian::inRandomOrder()->first()->id,
                'nilai' => $faker->numberBetween(60, 100),
                'kritik_saran' => $faker->sentence,
            ]);
        }
    }
}
