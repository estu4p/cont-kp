<?php

namespace Database\Seeders;

use App\Models\Paket;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $harga = ['1000000', '4000000', '7000000', '10000000'];
        for ($i = 0; $i < 4; $i++) {
            Subscription::create([
                "nama_lengkap" => User::inRandomOrder()->first()->id,
                "paket_id" => Paket::inRandomOrder()->first()->id,
                "harga" => $harga[$i],
            ]);
        }
    }
}
