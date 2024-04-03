<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = "divisi";
    protected $fillable = ['nama_divisi', 'deskripsi_divisi'];

    // Tetapkan nilai default untuk deskripsi_divisi
    protected $attributes = [
        'deskripsi_divisi' => ''
    ];

    public function mahasiswa()
    {
        return $this->hasMany(User::class, 'divisi_id')->where('role_id', 3);
    }

    public function anggotaDivisi()
    {
        return $this->hasMany(User::class, 'divisi_id')->where('role_id', 3);
    }
}
