<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPenilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'divisi_id',
        'nama_kategori'
    ];
    protected $table = 'kategori_penilaian';

    public function subKategori()
    {
        return $this->belongsTo(SubKategoriPenilaian::class, 'sub_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function penilaian()
    {
      return $this->hasMany(Penilaian::class, 'kategori_id');
    }
}
