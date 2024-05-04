<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PaketSeeder;
use Database\Seeders\DivisiSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            DivisiSeeder::class,
            MitraSeeder::class,
            ShiftSeeder::class,
            PaketSeeder::class,
            SekolahSeeder::class,
            UserSeeder::class,
            PresensiSeeder::class,
            KategoriPenilaian::class,
            SubKategoriPenilaian::class,
            PenilaianSeeder::class,
            QuotesSeeder::class,
            SubscriptionSeeder::class,
        ]);
    }
}
