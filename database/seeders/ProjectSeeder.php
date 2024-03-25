<?php

namespace Database\Seeders;

use App\Models\project;
use App\Models\Project as ModelsProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = ['Controlling Magang', 'POS Djuragan', 'Area Kerja'];
        $tim = ['Tim A', 'Tim B', 'Tim C'];
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 3; $i++) {
            ModelsProject::create([
                'nama_project' => $project[$i],
                'deskripsi_project' => $faker->sentence(10),
                'nama_tim' => $tim[$i],
                'tgl_mulai' => $faker->date,
                'tgl_selesai' => $faker->date,
            ]);
        }
    }
}
