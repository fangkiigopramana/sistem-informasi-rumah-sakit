<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function show()
    {
        // $countPasien = DB::select('select count(*) as sum from pasiens');
        $countPasien = DB::select('SELECT COUNT(*) AS count FROM pasiens')[0]->count;
        $countDokter = DB::select('SELECT COUNT(*) AS count FROM dokters')[0]->count;
        $countRekamMedis = DB::select('SELECT COUNT(*) AS count FROM data_rekam_medis')[0]->count;
        // $countDokter = Dokter::get()->count();
        // $countRekamMedis = Dokter::get()->count();

        $pasienPria =  Pasien::where('jenis_kelamin', 'Laki-Laki')->get()->count();
        $pasienPerempuan =  Pasien::where('jenis_kelamin', 'Perempuan')->get()->count();

        $dokterPria =  Dokter::where('jenis_kelamin', 'Laki-Laki')->get()->count();
        $dokterPerempuan =  Dokter::where('jenis_kelamin', 'Perempuan')->get()->count();

        $full_name = auth()->user()->full_name;

        $jenisKelaminPria = $dokterPria;
        $jenisKelaminPerempuan = $dokterPerempuan;
        // dd($countRekamMedis);
        return view('dashboard.index', 
        compact('full_name','countRekamMedis','countPasien', 'countDokter', 'jenisKelaminPria', 'jenisKelaminPerempuan')
    );
    }
}
