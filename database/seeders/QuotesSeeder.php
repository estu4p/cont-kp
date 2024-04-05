<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quotes')->insert([
            ['quote' => "Change your life now for better future"],
            ['quote' => "Jujur terlalu tertanam di dalam hati"],
            ['quote' => "Aku jujur dan disiplin"],
            ['quote' => "Aku selalu mengembangkan potensiku"],
            ['quote' => "Aku selalu melakukan yang terbaik"],
            ['quote' => "Rasa malas adalah musuhku"],
            ['quote' => "Hari ini harus lebih baik dari kemarin"],
            ['quote' => "Tidak ada kata menyerah dalam hidupku"]
        ]);
    }
}
