<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',    // ← Tambahkan ini
        'address',  // ← Dan ini juga
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_verified_at' => 'datetime',
        ];
    }

    public function hasVerifiedTwoFactor()
    {
        return !is_null($this->two_factor_secret) && !is_null($this->two_factor_verified_at);
    }

    // 🔗 Relasi ke transaksi (khusus kasir)
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'kasir_id');
    }
}
