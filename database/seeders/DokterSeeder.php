<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dokter;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokter::create([
            'dokter_nama' => 'dr. Anton Isdijanto, Sp.PD',
            'spesialis' => 'Penyakit Bagian Dalam',
            'umur' => '38',
            'jenis_kelamin' => 'Laki-laki',
            'no_telepon' => '082145678990',
            'alamat' => 'Jl. Iwenesari No.33, Semarang',
            'email' => 'antonisdijanto@gmail.com'
        ]);

        Dokter::create([
            'dokter_nama' => 'dr. Petrus Fransiscus Christanto Tan, Sp.PD',
            'spesialis' => 'Penyakit Bagian Dalam',
            'umur' => '37',
            'jenis_kelamin' => 'Laki-laki',
            'no_telepon' => '081234567899',
            'alamat' => 'Jl. Iwenesari No.37, Semarang',
            'email' => 'petrusfransiscus@gmail.com'
        ]);
    }
}
