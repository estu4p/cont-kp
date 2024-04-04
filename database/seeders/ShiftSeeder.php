<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shift = ['Pagi', 'Middle', 'Siang'];
        for ($i = 0; $i < 3; $i++) {
            Shift::create([
                'nama_shift' => $shift[$i],
                'jml_jam_kerja' => '7 jam',
                'jam_masuk' => '06.30',
                'jam_pulang' => '13.00'
            ]);
        }
    }
}
