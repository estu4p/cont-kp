<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['nama_lengkap', 'sekolah', 'email', 'no_hp', 'password'];
    protected $table = 'sekolah';
    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
