<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket = ['Gold', 'Silver', 'Bronze'];
        $metode = ['BNI', 'Dana'];
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 3; $i++) {
            paket::create([
                'nama_paket' => $paket[$i],
                'metode_bayar' => $faker->randomElement($metode),
            ]);
        }
    }
}
