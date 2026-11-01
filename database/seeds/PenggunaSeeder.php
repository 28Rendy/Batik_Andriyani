<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Update user admin lama jika ada menjadi data dummy SIMARA
        $existing = User::where('email', 'adminpa1@bsi.ac.id')
            ->orWhere('username', 'admin')
            ->first();

        if ($existing) {
            $existing->nama = "Administrator SIMARA";
            $existing->username = "admin";
            $existing->email = "admin@arunabatik.com";
            $existing->roles = "PEMILIK";
            $existing->password = Hash::make("admin123");
            $existing->phone = "081234567890";
            $existing->address = "Jl. Gajah Mada No. 88, Tegal Barat, Kota Tegal, Jawa Tengah 52113";
            $existing->status = "ACTIVE";
            $existing->nama_ibu = "Ibu Aruna";
            $existing->pemilik = "PEMILIK";
            $existing->save();
            $this->command->info("User Admin SIMARA berhasil diperbarui");
        } else {
            $pengguna = new User;
            $pengguna->nama = "Administrator SIMARA";
            $pengguna->username = "admin";
            $pengguna->email = "admin@arunabatik.com";
            $pengguna->roles = "PEMILIK";
            $pengguna->password = Hash::make("admin123");
            $pengguna->phone = "081234567890";
            $pengguna->address = "Jl. Gajah Mada No. 88, Tegal Barat, Kota Tegal, Jawa Tengah 52113";
            $pengguna->status = "ACTIVE";
            $pengguna->nama_ibu = "Ibu Aruna";
            $pengguna->pemilik = "PEMILIK";
            $pengguna->save();
            $this->command->info("User Admin SIMARA berhasil dibuat");
        }
    }
}
