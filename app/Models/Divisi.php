<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = "divisi";
    protected $fillable = ['nama_divisi', 'foto_divisi'];


    public function mahasiswa()
    {
        return $this->hasMany(User::class, 'divisi_id')->where('role_id', 3);
    }

    public function anggotaDivisi()
    {
        return $this->hasMany(User::class, 'divisi_id')->where('role_id', 3);
    }

    public function namaDivisi()
    {
        return $this->belongsTo(User::class, 'nama_lengkap','email');
    }
    
}
