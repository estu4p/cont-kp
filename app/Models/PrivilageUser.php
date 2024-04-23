<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivilageUser extends Model
{
    use HasFactory;
    protected $table = 'privilage_user';
    protected $fillable = ['user_id', 'privilage_id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function privilage()
    {
        return $this->belongsTo(Privilage::class);
    }
}
