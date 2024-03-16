<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    use HasFactory;
    protected $table = "daftar";
    protected $fillable = [
                        'email',
                        'password'];

    // protected $table = 'users';
}

