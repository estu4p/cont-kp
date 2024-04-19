<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiItem extends Model
{
    use HasFactory;
    protected $fillable = ['mitra_id', 'divisi_id'];
    protected $table = 'divisi_item';
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
