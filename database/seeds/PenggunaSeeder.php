<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengguna = new \App\Models\User;
        $pengguna->nama = "Administrator";
        $pengguna->username = "admin";
        $pengguna->email = "adminpa1@bsi.ac.id"; 
        $pengguna->roles = "PEMILIK"; 
        $pengguna->password = Hash::make("admin"); 
        $pengguna->phone = "081851851851"; 
        $pengguna->address = "Jl Raya Jatiwaringin No. 101";
        $pengguna->status = "ACTIVE";
        $pengguna->nama_ibu = "Admin";
        $pengguna->pemilik = "PEMILIK";
        $pengguna->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}