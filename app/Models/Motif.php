<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    protected $table = 'motif'; // nama tabel di database

    protected $fillable = [
        'kode_motif',
        'nama',
        'deskripsi',
        'harga',
    ];
}

