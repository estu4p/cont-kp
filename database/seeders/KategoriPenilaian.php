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
        $kategori = ['Pengetahuan', 'Kreativitas', 'Kedisiplinan', 'Kejujuran', 'Kerja Sama'];
        for ($i = 0; $i < 5; $i++) {
            ModelsKategoriPenilaian::create([
                'divisi_id' => Divisi::inRandomOrder()->first()->id,
                'nama_kategori' => $kategori[$i],
            ]);
        }
    }
}
