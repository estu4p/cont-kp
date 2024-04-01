<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ['nama_lengkap', 'paket_id', 'harga'];
    protected $table = 'subscription';

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_lengkap', 'id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }
}
