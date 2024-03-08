<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = ['nama_mahasiswa', 'email', 'nomor_induk_mahasiswa', 'jurusan', 'no_hp', 'address', 'about', 'mitra_id'];
    public $timestamps = false;


    // private static $dataMahasiswa = [
    //     ['nama' => 'Syalita Widyandini', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
    //     ['nama' => 'Fairuza Attar Aviciena', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
    //     ['nama' => 'Danni Hernando', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
    //     ['nama' => 'Febrian Adipurnowo', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Inactive'],
    //     ['nama' => 'Yessa Khoirunissa', 'nip' => '2000018247', 'divisi' => 'PROGRAMMER', 'status' => 'done'],
    //     ['nama' => 'Syalita Widyandini', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
    //     ['nama' => 'Fairuza Attar Aviciena', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Active'],
    //     ['nama' => 'Danni Hernando', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'done'],
    //     ['nama' => 'Febrian Adipurnowo', 'nip' => '2000018247', 'divisi' => 'UI/UX', 'status' => 'Inactive'],
    //     ['nama' => 'Yessa Khoirunissa', 'nip' => '2000018247', 'divisi' => 'PROGRAMMER', 'status' => 'done'],
    // ];

    // public static function getDataMahasiswa()
    // {
    //     return collect(self::$dataMahasiswa);
    // }
}
