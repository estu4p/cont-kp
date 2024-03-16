<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = ['nama_project', 'deskripsi', 'nama_tim', 'tgl_mulai', 'tgl_selesai'];
    protected $table = 'project';
}
