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
        return $this->hasMany(SubKategoriPenilaian::class, 'kategori_id', 'id');
    }
}
