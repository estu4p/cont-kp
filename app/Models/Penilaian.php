<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $fillable = ['nama_lengkap', 'sub_id', 'nilai', 'kritik_saran'];
    protected $table = 'penilaian';
    public function kategori()
    {
        return $this->hasMany(KategoriPenilaian::class, 'id');
    }
    public function subKategoriPenilaian()
    {
        // Gunakan nama kelas yang benar dan pastikan menggunakan penamaan kolom yang sesuai
        return $this->belongsTo(SubKategoriPenilaian::class, 'sub_id');
    }
     public function user()
    {
        return $this->belongsTo(User::class, 'nama_lengkap');
    }

    public function kategoriPenilaian()
    {
      return $this->belongsTo(KategoriPenilaian::class, 'kategori_id');
    }
}
