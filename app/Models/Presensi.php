<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_lengkap', 'hari', 'jam_masuk', 'jam_keluar', 'jam_mulai_istirahat', 'jam_selesai_istirahat', 'total_jam_kerja', 'log_aktivitas', 'aksi', 'status_kehadiran', 'kebaikan', 'barcode', 'hutan_presensi'];
    protected $table = "presensi";

    public function user()
    {
        return $this->hasOne(User::class, 'nama_lengkap', 'id');
    }
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'nama_sekolah');
    }
}
