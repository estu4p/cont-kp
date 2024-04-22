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

    protected $table = 'users';

    protected $fillable = [
        'nama_lengkap',
        'nomor_induk',
        'foto_profil',
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
        'konfirmasi_email',
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
        'privilage_id',
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

    public function assignPrivilege($privilegeId)
    {
        $this->privileges()->attach($privilegeId);
    }

    // Relasi dengan model Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function privilage()
    {
        return $this->belongsToMany(Privilage::class);
    }

    public function privilageuser()
    {
        return $this->belongsToMany(PrivilageUser::class);
    }

    public function privileges()
    {
        return $this->belongsToMany(Privilage::class, 'user_privilege', 'user_id', 'privilege_id');
    }


  

    public function mahasiswa()
    {
        return $this->belongsToMany(Privilage::class, 'mahasiswa', 'user_id', 'mahasiswa_id');
    }
    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_user', 'user_id', 'mahasiswa_id');
    }
   


}



