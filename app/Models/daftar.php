<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['nama_lengkap',
                        'sekolah',
                        'email',
                        'no_hp',
                        'password'];

    // protected $table = 'users';
}
