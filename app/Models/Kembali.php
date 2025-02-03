<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'tgl_kembali',
        'kondisi_mobil',
        'denda',
    ];

    // Define the relationship to the Transaksi model
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
