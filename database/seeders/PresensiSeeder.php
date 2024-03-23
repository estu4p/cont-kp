<?php

namespace Database\Seeders;

use App\Models\Divisi;
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
            $user = User::where('role_id', 3)->inRandomOrder()->first(); // Ambil satu pengguna secara acak dengan role ID 3
            $mitra = Mitra::inRandomOrder()->first(); // Ambil satu mitra secara acak
            $divisi = Divisi::inRandomOrder()->first();
            // Periksa apakah pengguna ditemukan
            if ($user) {
                // Periksa apakah nama pengguna sudah ada dalam presensi
                $existingPresensi = Presensi::where('nama_lengkap', $user->id)->exists();

                // Jika nama pengguna belum ada dalam presensi, maka buat presensi baru
                if (!$existingPresensi) {
                    Presensi::create([
                        'nama_lengkap' => $user->id, // Menggunakan ID pengguna sebagai nama lengkap (asumsi nama lengkap dihapus dan digantikan dengan ID)
                        'hari' => $faker->dateTime,
                        'jam_masuk' => $faker->dateTimeBetween('-1 year', 'now'),
                        'jam_pulang' => $faker->dateTimeBetween('-1 year', 'now'),
                        'jam_mulai_istirahat' => $faker->dateTimeBetween('-1 year', 'now'),
                        'jam_selesai_istirahat' => $faker->dateTimeBetween('-1 year', 'now'),
                        'total_jam_kerja' => $faker->randomFloat(2, 0, 8), // Misalnya, total jam kerja antara 0 dan 8 jam
                        'log_aktivitas' => $faker->sentence,
                        'aksi' => $faker->boolean,
                        'status_kehadiran' => $faker->randomElement(['Hadir', 'Izin', 'Sakit', 'Tidak Hadir']),
                        'keterangan_status' => $faker->sentence,
                        'kebaikan' => $faker->sentence,
                        'status_absensi' => $faker->randomElement(['Scan QR Code', 'Button']),
                        'barcode' => $faker->ean13,
                        'hutang_presensi' => $faker->dateTime
                    ]);
                }
            }
        }
    }
}
