<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduksiSendiri extends Model
{


    protected $table = 'produksi_sendiri';

    protected $fillable = [
        'nama_produk',
        'motif_id',
        'jenis_kain_id',
        'ukuran_id',
        'stok',
        'harga',
        'foto',
        'kode_produk',
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
    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'produk_id');
    }

    public function getKodeProdukAttribute()
    {
        return $this->motif->kode_motif . '-' . $this->attributes['kode_produk'];
    }
}
