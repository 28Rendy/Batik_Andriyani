<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $table = "persediaan";
    protected $fillable = ['id', 'kdps', 'nmps', 'qty', 'hj'
    ];
}
