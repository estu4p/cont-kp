<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriPenilaian extends Model
{
    use HasFactory;
    protected $fillable = ['kategori_id', 'nama_sub_kategori'];
    protected $table = 'sub_kategori_penilaian';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'sub_id');
    }
 }
