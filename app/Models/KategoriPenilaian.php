<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPenilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'divisi_id',
        'nama_lengkap',
        'nama_kategori'
    ];
    protected $table = 'kategori_penilaian';

    public function subKategori()
    {
        return $this->hasMany(SubKategoriPenilaian::class, 'kategori_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'nama_lengkap');
    }


    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

}
