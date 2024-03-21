<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama_lengkap',
        'nomor_induk',
        'sekolah',
        'jurusan',
        'email',
        'username',
        'no_hp',
        'barcode',
        'password',
        'kota',
        'alamat',
        'tgl_lahir',
        'about',
        'os',
        'status_akun',
        'status_absensi',
        'browser',
        'tgl_masuk',
        'tgl_keluar',
        'email_verified_at',
        'mitra_id',
        'role_id',
        'divisi_id',
        'shift_id',
        'paket_id',
        'project_id'

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
