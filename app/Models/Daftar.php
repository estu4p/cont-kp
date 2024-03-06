<?php
// app\Models\Daftar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sekolah',
        'email',
        'telephone',
        'password',
    ];
    protected $table = 'daftar';
}
