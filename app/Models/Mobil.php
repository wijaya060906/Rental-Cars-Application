<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nopol',  // Tambahkan nopol di sini
        'brand',
        'type',
        'tahun',
        'harga',
        'foto',
        'status',
    ];

    // Relasi dengan model Transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'nopol', 'nopol');
    }
}
