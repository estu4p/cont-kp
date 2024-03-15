<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = "divisi";
    protected $fillable = ['nama_divisi', 'deskripsi_divisi'];

    public function divisi()
    {
        return $this->hasMany(User::class)->orderBy('nama_divisi');
    }
}
