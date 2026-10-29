<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanKas extends Model
{


    protected $table = 'pemasukan_kas';

    protected $fillable = [
        'tanggal',
        'nama_pelanggan',
        'nama_produk',
        'produk_type',
        'jumlah_item',
        'harga_satuan',
        'total_bayar',
        'informasi_pembayaran',
        'keterangan',
        'bukti_pembayaran',
        'status_pembayaran',
        
    ];

    public function getNamaProdukAttribute()
    {
        if ($this->produk_type === 'produksi_sendiri') {
            $produk = \App\Models\ProduksiSendiri::find($this->produk_id);
            return $produk ? $produk->nama_produk : '-';
        } elseif ($this->produk_type === 'setengah_jadi') {
            $produk = \App\Models\SetengahJadi::find($this->produk_id);
            return $produk ? $produk->nama_produk : '-';
        }
    
        return '-';
    }
    
}
