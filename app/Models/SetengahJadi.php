<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Motif;
use App\Models\Ukuran;
use App\Models\JenisKain;

class SetengahJadi extends Model
{
    protected $table = 'setengah_jadi';

    protected $fillable = [
        'nama_produk',
        'motif_id',
        'jenis_kain_id',
        'ukuran_id',
        'kode_produk',
        'harga',
        'foto',
        'stok',  // TAMBAHKAN field stok ke fillable
    ];

    public function motif()
    {
        return $this->belongsTo(Motif::class);
    }

    public function JenisKain()
    {
        return $this->belongsTo(JenisKain::class);
    }

    public function ukuran()
    {
        return $this->belongsTo(Ukuran::class);
    }

    public function getKodeProdukAttribute()
    {
        return $this->motif->kode_motif . '-' . $this->attributes['kode_produk'];
    }
}