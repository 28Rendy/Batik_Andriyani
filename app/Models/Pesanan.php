<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'user_id', 'produk_id', 'sumber_produk', 'nama_produk',
        'jumlah', 'harga_satuan', 'total', 'catatan',
        'status_pesanan', 'status_pengiriman', 'alamat_pengiriman', 'no_hp'
    ];

    /**
     * Relasi ke User (pelanggan).
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Label warna status pesanan untuk badge.
     */
    public function statusBadgeClass()
    {
        switch ($this->status_pesanan) {
            case 'pending':    return 'warning';
            case 'diproses':   return 'info';
            case 'selesai':    return 'success';
            case 'dibatalkan': return 'danger';
            default:           return 'secondary';
        }
    }

    /**
     * Label warna status pengiriman untuk badge.
     */
    public function pengirimanBadgeClass()
    {
        switch ($this->status_pengiriman) {
            case 'menunggu': return 'secondary';
            case 'dikirim':  return 'info';
            case 'diterima': return 'success';
            default:         return 'secondary';
        }
    }
}

