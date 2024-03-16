<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = ['nama_shift', 'jml_jam_kerja', 'jam_masuk', 'jam_pulang'];
    protected $table =  'shift';
}
