<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilage extends Model
{
    use HasFactory;
    protected $fillable = ['privilage'];
    protected $table = 'privilage';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function privilageUser()
    {
        return $this->belongsToMany(PrivilageUser::class);
    }


}
