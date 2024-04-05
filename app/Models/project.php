<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['nama_project', 'deskripsi', 'nama_tim', 'tgl_mulai', 'tgl_selesai'];
    protected $table = 'project';

    public function project()
    {
        return $this->hasMany(User::class, 'project_id')->where('role_id', 3);
    }
}
