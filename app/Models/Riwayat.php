<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable = ['nama_paket', 'tanggal', 'tanggal_berakhir', 'status', 'no_pesanan', 'harga', 'paket', 'metode_bayar', 'lokasi'];
    protected $table = 'riwayat';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }    
}
