<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Paket;
use App\Models\Project;
use App\Models\Sekolah;
use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            User::create([
                'nama_lengkap' => $faker->name,
                'nomor_induk' => $faker->unique()->randomNumber(8),
                'jurusan' => $faker->randomElement(['Ilmu Komputer', 'Teknik Informatika', 'Sistem Informasi', 'Manajemen Informatika', 'Teknik Elektro']),
                'email' => 'example@gmail.com',
                'username' => $faker->userName,
                'no_hp' => $faker->phoneNumber,
                'barcode' => $faker->ean13(),
                'password' => Hash::make('123456'),
                'kota' => $faker->city,
                'alamat' => $faker->address,
                'tgl_lahir' => $faker->dateTime,
                'about' => $faker->sentence,
                'os' => $faker->randomElement(['Windows', 'Mac OS', 'linux']),
                'browser' => $faker->randomElement(['Chrome', 'Edge']),
                'tgl_masuk' => $faker->dateTime,
                'tgl_keluar' => $faker->dateTime,
                'jam_default_masuk' => '06:30:00',
                'jam_default_pulang' => '13:00:00',
                'konfirmasi_email' => $faker->randomElement(['Sudah', 'Belum']),
                'status_akun' => $faker->randomElement(['Aktif', 'Alumni']),
                'sekolah' => Sekolah::inRandomOrder()->first()->id,
                'mitra_id' => Mitra::inRandomOrder()->first()->id,
                'role_id' => Role::inRandomOrder()->first()->id,
                'shift_id' => Shift::inRandomOrder()->first()->id,
                'divisi_id' => Divisi::inRandomOrder()->first()->id,
                'project_id' => Project::inRandomOrder()->first()->id,
                'paket_id' => Paket::inRandomOrder()->first()->id,
            ]);
        }
    }
}
