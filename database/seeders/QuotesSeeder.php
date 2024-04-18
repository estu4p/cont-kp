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
            ['quote' => "Change your life now for better future", 'type' => 'quotes_harian'],
            ['quote' => "Jujur terlalu tertanam di dalam hati", 'type' => 'quotes_harian'],
            ['quote' => "Aku jujur dan disiplin", 'type' => 'quotes_harian'],
            ['quote' => "Aku selalu mengembangkan potensiku", 'type' => 'quotes_harian'],
            ['quote' => "Aku selalu melakukan yang terbaik", 'type' => 'quotes_harian'],
            ['quote' => "Rasa malas adalah musuhku", 'type' => 'quotes_harian'],
            ['quote' => "Hari ini harus lebih baik dari kemarin", 'type' => 'quotes_harian'],
            ['quote' => "Tidak ada kata menyerah dalam hidupku", 'type' => 'quotes_harian'],
            ['quote' => "Selamat Ulang Tahun", 'type' => 'quotes_ulangtahun'],
        ]);
    }
}
