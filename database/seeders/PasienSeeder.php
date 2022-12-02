<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pasien::create([
            'pasien_nama' => 'Fauzan Pradana',
            // 'slug' => 'fauzan-pradana',
            'umur' => '19',
            'jenis_kelamin' => 'Laki-laki',
            'no_telepon' => '082145678990',
            'alamat' => 'Jl. Diponegoro No.2, Semarang',
            'email' => 'pradanafauzan@gmail.com',
        ]);

        Pasien::create([
            'pasien_nama' => 'Putri Aprilia',
            // 'slug' => 'putri-aprilia',
            'umur' => '22',
            'jenis_kelamin' => 'Perempuan',
            'no_telepon' => '081325674681',
            'alamat' => 'Jl. Iwenesari No.31, Semarang',
            'email' => 'putriaprilia@gmail.com',
        ]);

        Pasien::create([
            'pasien_nama' => 'Amelia Sulastri',
            // 'slug' => 'amelia-sulastri',
            'umur' => '20',
            'jenis_kelamin' => 'Perempuan',
            'no_telepon' => '082247874681',
            'alamat' => 'Jl. Tirtasari No.18, Semarang',
            'email' => 'ameliasulastri@gmail.com',
        ]);
    }
}
