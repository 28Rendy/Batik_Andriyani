<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';

    protected $fillable = [
        'tanggal',
        'keterangan',
        'kategori',
        'jumlah',
        'total',
        'metode_pembayaran',
        'bukti_pembayaran',
        'penerima',
    ];
}
