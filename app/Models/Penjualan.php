<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan_batik'; // Nama tabel
    
    protected $fillable = [
        'tanggal_penjualan',
        'nama_pelanggan',
        'produk_id',
        'kode_produk',
        'nama_produk',
        'sumber_produk',
        'jumlah_item',
        'harga_satuan',
        'total_bayar',
        'keterangan',
        'bukti_pembayaran',
        'status_pembayaran',
    ];

    // Relasi dengan model ProduksiSendiri
    public function produk()
    {
        return $this->belongsTo(ProduksiSendiri::class, 'produk_id');
    }

    
}
