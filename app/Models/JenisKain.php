<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKain extends Model
{
    protected $table = 'jenis_kain'; // wajib karena pakai underscore (bukan plural default)

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
    ];

    // Relasi satu ke banyak dengan ProduksiSendiri
    public function produksisendiri()
    {
        return $this->hasMany(ProduksiSendiri::class);
    }
}
