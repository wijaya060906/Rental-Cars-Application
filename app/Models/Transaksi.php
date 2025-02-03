<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',  
        'nopol',      
        'tgl_booking',
        'tgl_ambil',
        'tgl_kembali',
        'supir',
        'total',   
        'downpayment',
        'kekurangan',
        'status',
            ];

            public function member()
            {
                return $this->belongsTo(Member::class, 'nik'); // Adjust if necessary
            }
        public function mobil()
        {       
            return $this->belongsTo(Mobil::class, 'nopol'); // Adjust if necessary
        }
}
