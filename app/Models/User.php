<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use Notifiable;
    use HasRoles; // Memastikan model ini dapat menggunakan fitur Role & Permission
  protected $table = 'users'; // penting karena tidak plural

    // Kolom-kolom yang dapat diisi mass-assignable
    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'roles',
        'address',
        'phone',
        'status',
        'nama_ibu',
        'pemilik',
    ];

    // Kolom yang harus disembunyikan ketika diakses dalam array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];
        // Membuat mutator untuk kolom pemilik
    // public function setPemilikAttribute($value)
    // {
    //     // Jika roles adalah 'PEMILIK', set pemilik menjadi 1, jika tidak, set menjadi 0
    //     $this->attributes['pemilik'] = $this->roles === 'PEMILIK' ? 1 : 0;
    // }
}
