<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sekolah extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['nama_lengkap', 'sekolah', 'email', 'no_hp', 'password'];
    protected $table = 'sekolah';

    public function passwordchek($password)
    {
        return Hash::check($password, $this->password);
    }
    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
