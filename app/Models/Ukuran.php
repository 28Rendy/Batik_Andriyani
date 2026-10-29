<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = 'ukuran'; // penting karena tidak plural

    protected $fillable = [
        'ukuran',
        'deskripsi',
    ];

    // Relasi satu ke banyak dengan ProduksiSendiri
    public function produksisendiri()
    {
        return $this->hasMany(ProduksiSendiri::class);
    }
}
