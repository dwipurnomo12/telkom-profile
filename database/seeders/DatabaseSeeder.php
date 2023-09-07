<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => 1234,
            'role_id'   => 1
        ]);
        User::create([
            'name'      => 'Mujiyono',
            'email'     => 'mujiyono@gmail.com',
            'password'  => 1234,
            'role_id'   => 2
        ]);

        Role::create([
            'role'  => 'admin'
        ]);
        Role::create([
            'role'  => 'pengunjung'
        ]);

        Layanan::create([
            'nm_layanan'    => 'Teknisi',
            'kd_layanan'    => 'TKN-',
            'slug'          => 'layanan-teknisi',
            'deskripsi'     => 'Ini adalah layanan Teknisi',
            'batas_antrian' => 10,
            'user_id'       => 1
        ]);
        Layanan::create([
            'nm_layanan'    => 'Pembayaran',
            'kd_layanan'    => 'PBY-',
            'slug'          => 'layanan-pembayaran',
            'deskripsi'     => 'Ini adalah layanan Pembayaran',
            'batas_antrian' => 10,
            'user_id'       => 1
        ]);
        Layanan::create([
            'nm_layanan'    => 'Pemasangan Baru',
            'kd_layanan'    => 'PGB-',
            'slug'          => 'layanan-pemasangan-baru',
            'deskripsi'     => 'Ini adalah layanan pemasangan baru',
            'batas_antrian' => 10,
            'user_id'       => 1
        ]);
    }
}
