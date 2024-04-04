<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = ['nama_sekolah', 'nama_lengkap',  'email', 'no_hp', 'password'];
    protected $table = 'sekolah';

    public function namaSekolah()
    {
        return $this->belongsTo(User::class, 'nama_sekolah');
    }
}
