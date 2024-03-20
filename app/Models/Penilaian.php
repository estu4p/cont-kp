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
}
