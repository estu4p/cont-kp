<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $table = 'shift';
    protected $fillable = [
        'nama_shift',
        'jml_jam_kerja',
        'jam_masuk',
        'jam_pulang'
    ];
}
