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
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 3; $i++) {
            ModelsProject::create([
                'nama_project' => $faker->randomElement(['Controlling Magang', 'POS Djuragan', 'Area Kerja']),
                'deskripsi_project' => $faker->sentence(10),
                'nama_tim' => 'nama Tim',
                'tgl_mulai' => $faker->date,
                'tgl_selesai' => $faker->date,
            ]);
        }
    }
}
