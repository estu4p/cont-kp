<?php

namespace Database\Seeders;

use App\Models\Mitra;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            $user = User::inRandomOrder()->first(); // Ambil satu pengguna secara acak
            $mitra = Mitra::inRandomOrder()->first(); // Ambil satu mitra secara acak

            Presensi::create([
                'nama_lengkap' => $user->id, // Menggunakan nama lengkap pengguna
                'jam_masuk' => $faker->dateTimeBetween('-1 year', 'now'),
                'jam_pulang' => $faker->dateTimeBetween('-1 year', 'now'),
                'jam_mulai_istirahat' => $faker->dateTimeBetween('-1 year', 'now'),
                'jam_selesai_istirahat' => $faker->dateTimeBetween('-1 year', 'now'),
                'total_jam_kerja' => $faker->randomFloat(2, 0, 8), // Misalnya, total jam kerja antara 0 dan 8 jam
                'log_aktivitas' => $faker->sentence,
                'aksi' => $faker->boolean,
                'status_kehadiran' => $faker->randomElement(['Hadir', 'Izin', 'Sakit', 'Tidak Hadir']),
                'kebaikan' => $faker->sentence,
                'mitra_id' => $mitra->id,
            ]);
        }
    }
}
