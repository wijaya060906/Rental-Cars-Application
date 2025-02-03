<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kembali',
        'tgl_bayar',
        'total_bayar',
        'status',
    ];

    // Define the relationship to the Kembali model
    public function kembali()
    {
        return $this->belongsTo(Kembali::class, 'id_kembali');
    }
}
