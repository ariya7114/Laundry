<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'kasir_id',
        'user_id',
        'kode_transaksi',
        'jenis_jasa',
        'layanan',
        'berat',
        'total_harga',
        'metode_pembayaran',
        'status',
    ];

    // Relasi ke kasir
    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }

    // Relasi ke pelanggan (user)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
