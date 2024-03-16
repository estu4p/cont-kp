<?php

namespace Database\Seeders;

use App\Models\paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 3; $i++) {
            paket::create([
                'nama_paket' => $faker->randomElement(['Gold', 'Silver', 'Bronze']),
                'metode_bayar' => $faker->randomElement(['BNI', 'Dana']),
            ]);
        }
    }
}
