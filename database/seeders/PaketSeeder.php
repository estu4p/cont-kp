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
        $paket = ['Bronze', 'Silver', 'Gold', 'Platinum'];
        $harga = ['1000000', '4000000', '7000000', '10000000'];
        for ($i = 0; $i < 4; $i++) {
            paket::create([
                'paket' => $paket[$i],
                'harga' => $harga[$i],
            ]);
        }
    }
}
