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
        return $this->belongsTo(KategoriPenilaian::class, 'kategori_id');
    }
    public function subKategori()
    {
        return $this->belongsTo(SubKategoriPenilaian::class, 'sub_id', 'id', 'nama_sub_kategori');
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
