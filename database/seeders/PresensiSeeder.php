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
            // Periksa apakah pengguna ditemukan
            if ($user) {
                // Periksa apakah nama pengguna sudah ada dalam presensi
                $existingPresensi = Presensi::where('nama_lengkap', $user->id)->exists();

                // Jika nama pengguna belum ada dalam presensi, maka buat presensi baru
                if (!$existingPresensi) {
                    Presensi::create([
                        'nama_lengkap' => $user->id, // Menggunakan ID pengguna sebagai nama lengkap (asumsi nama lengkap dihapus dan digantikan dengan ID)
                        'hari' => $faker->dateTime,
                        'jam_masuk' => '06:30:00',
                        'jam_pulang' => '13:00:00',
                        'jam_mulai_istirahat' => '12:00:00',
                        'jam_selesai_istirahat' => '12:15:00',
                        'total_jam_kerja' => '06:15:00', // Misalnya, total jam kerja antara 0 dan 8 jam
                        'log_aktivitas' => $faker->sentence,
                        'aksi' => $faker->boolean,
                        'status_kehadiran' => $faker->randomElement(['Hadir', 'Izin', 'Sakit', 'Tidak Hadir']),
                        'keterangan_status' => $faker->sentence,
                        'kebaikan' => $faker->sentence,
                        'barcode' => $faker->ean13,
                        'hutang_presensi' => $faker->dateTime
                    ]);
                }
            }
        }
    }
}
