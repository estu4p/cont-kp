<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';
    protected  $fillable = [
        'nama_project',
        'deskripsi_project',
        'nama_tim',
        'tgl_mulai',
        'tgl_selesai'
    ];
}
