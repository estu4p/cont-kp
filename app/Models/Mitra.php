<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $fillable = ['nama_mitra', 'deskripsi_mitra', 'divisi_mitra', 'status_absensi'];
    protected $table = 'mitra';
    public function mahasiswa()
    {
        return $this->hasMany(User::class)->where('role_id', 3);
    }
}
