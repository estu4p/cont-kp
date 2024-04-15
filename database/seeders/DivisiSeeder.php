<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisi')->insert([
            [
                'nama_divisi' => 'UI/UX Designer',
                'foto_divisi' => 'deskripsi divisi',
            ],
            [
                'nama_divisi' => 'Programmer',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Desain Grafis',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Fotografer',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Digital Marketing',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Human Resource',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Marketing & Sales',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Marcom/Public Relation',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Content Writer',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Content Planner',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Administrasi',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Project Manager',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Research & Developer',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Social Media Specialist',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Tiktok Creator',
                'foto_divisi' => 'Lorem ipsum dolor sit amet '
            ],
            [
                'nama_divisi' => 'Host/Presenter',
                'foto_divisi' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'nama_divisi' => 'Voice Over Talent',
                'foto_divisi' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'nama_divisi' => 'Las',
                'foto_divisi' => 'Lorem ipsum dolor sit amet'
            ]
        ]);
    }
}
