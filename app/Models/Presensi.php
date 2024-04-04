<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;


    protected $fillable = ['nama_lengkap', 'hari', 'jam_masuk', 'jam_pulang', 'jam_mulai_istirahat', 'jam_selesai_istirahat', 'total_jam_kerja', 'log_aktivitas', 'aksi', 'status_kehadiran', 'keterangan_status', 'bukti_foto_izin','kebaikan', 'barcode', 'hutang_presensi'];


    protected $table = "presensi";

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_lengkap');
    }
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'nama_sekolah');
    }
}
