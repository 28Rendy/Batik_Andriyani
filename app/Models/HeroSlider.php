<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    protected $table = 'hero_sliders';

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'urutan', 'aktif'];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}

