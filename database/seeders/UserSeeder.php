<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama_lengkap' => 'JLUN IS VERY GOOD',
                'nomor_induk_mahasiswa' => 2141720178,
                'jurusan' => 'Informatika',
                'email' => 'jlun@gmail.com',
                'username' => 'jlun',
                'no_hp' => 85256203,
                'role' => '1',
                'password' => Hash::make('123456')
            ], 
            [
                'nama_lengkap' => 'Alwan Alawi',
                'nomor_induk_mahasiswa' => 2141720165,
                'jurusan' => 'sipil',
                'email' => 'alwan@gmail.com',
                'username' => 'alwan',
                'no_hp' => 851234312,
                'role' => '1',
                'password' => Hash::make('123456')
            ]
        ]);
    }
}
