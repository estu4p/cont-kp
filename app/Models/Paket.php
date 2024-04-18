<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';

    protected $fillable = [
        'nama_paket',
        'tanggal',
        'status',
        'no_pesanan',
        'harga',
        'paket',
        'metode_bayar',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relasi dengan model User jika Anda ingin mengaitkan kota dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
