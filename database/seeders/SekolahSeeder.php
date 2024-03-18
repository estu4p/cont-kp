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
        $sekolah = ['Pengetahuan', 'Kreativitas', 'Kedisiplinan', 'Kejujuran', 'Kerja Sama'];
        for ($i = 0; $i < 5; $i++) {
            Sekolah::create([
                'nama' => 'Nama Sekolah',
                'sekolah' => $sekolah[$i],
                'email' => 'email.sekolah@gmail.com',
                'no_hp' => 07669865,
                'password' => Hash::make('123456'),
            ]);
        }
    }
}
