<?php

namespace App\Http\Controllers;

use App\Models\DataRekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use Carbon\Carbon;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;


class DataRekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas = DB::select('
       select 
            rm.id AS id, rm.keluhan AS keluhan, rm.diagnosis AS diagnosis, rm.created_at AS created_at, d.dokter_nama AS dokter_nama, p.pasien_nama AS pasien_nama
       from 
            data_rekam_medis rm 
       inner join 
            dokters d 
        on
            rm.dokter_id = d.dokter_id 
        inner join 
            pasiens p 
        on 
            rm.pasien_id = p.pasien_id 
        where 
            rm.deleted_at is NULL
        ');
        // $datas = DB::select('select * from data_rekam_medis ',);
        // $datas = DB::table('data_rekam_medis')->whereNull('data_rekam_medis.deleted_at')->get();
        // dd($datas);
        // $datas = DB::select('SELECT * FROM data_rekam_medis rm
        // INNER JOIN pasiens p ON rm.pasien_id = p.pasien_id
        // INNER JOIN dokters d ON rm.dokter_id = d.dokter_id');
        // dd($datas);
        return view('informasi-medis.rekam-medis.index', [
            'rekamMedis' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = DB::select('select * from pasiens');
        $dokter = DB::select('select * from dokters');
        // dd($pasien, $dokter);
        return view('informasi-medis.rekam-medis.create', [
            'pasien' => $pasien,
            'dokter' => $dokter
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|max:255',
            'keluhan' => 'required|max:255',
            'dokter_id' => 'required|max:255',
            'diagnosis' => 'required|max:255',
        ]);
        // dd($validatedData);
        // DataRekamMedis::create($validatedData)  ;
        DB::insert('INSERT INTO data_rekam_medis(pasien_id, keluhan, dokter_id, diagnosis, created_at, updated_at) VALUES(?, ?, ?, ?, ?, ?)',
            [
                $request->pasien_id,
                $request->keluhan,
                $request->dokter_id,
                $request->diagnosis,
                now(),
                now()
            ]
        );
        return redirect('/rekam-medis')->with('success', 'Yee, Data rekam medis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataRekamMedis  $dataRekamMedis
     * @return \Illuminate\Http\Response
     */
    // public function show(DataRekamMedis $dataRekamMedis)
    public function show($rm)
    {
        $data = DB::select('select * from data_rekam_medis rm inner join dokters d on rm.dokter_id = d.dokter_id inner join pasiens p on rm.pasien_id = p.pasien_id where rm.id = ?',[$rm])[0];
        // dd($data->pasien_nama);
        return view('informasi-medis.rekam-medis.show', [
            'dataRekamMedis' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataRekamMedis  $dataRekamMedis
     * @return \Illuminate\Http\Response
     */
    public function edit(DataRekamMedis $dataRekamMedis)
    {
        return view('informasi-medis.rekam-Medis.edit', [
            'dataRekamMedis' => $dataRekamMedis,
            'pasien' => DB::select('select * from pasiens'),
            'dokter' => DB::select('select * from dokters')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataRekamMedis $dataRekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataRekamMedis $dataRekamMedis)
    {
        // request validation
        $request->validate([
            'pasien_id' => 'required|max:255',
            'keluhan' => 'required|max:255',
            'dokter_id' => 'required|max:255',
            'diagnosis' => 'required|max:255',
        ]);

        // without eloquent
        DB::update('UPDATE data_rekam_medis SET pasien_id = :pasien_id, keluhan = :keluhan, dokter_id = :dokter_id, diagnosis = :diagnosis, updated_at = :updated_at  where id = :id',
            [
                'pasien_id' => $request->pasien_id,
                'keluhan' => $request->keluhan,
                'dokter_id' => $request->dokter_id,
                'diagnosis' => $request->diagnosis,
                'updated_at' => now(),
                'id' => $dataRekamMedis->id
            ]
        );

        // with eloquent
        // DataRekamMedis::where('id', $dataRekamMedis->id)->update($validatedData);

        return redirect('/rekam-medis')->with('success', 'Yee, Data rekam medis berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataRekamMedis $dataRekamMedis
     * @return \Illuminate\Http\Response
     */



    // ---- softDelete with eloquent
    public function softDelete(DataRekamMedis $dataRekamMedis)
    {
        // ---- softDelete with eloquent
      
        //      DB::delete('delete from data_rekam_medis where id = :id',['id' => $dataRekamMedis->id]);
        //      DataRekamMedis::destroy($dataRekamMedis->id);
      
        // ---- softDelete without eloquent
        DB::update('UPDATE data_rekam_medis SET deleted_at = ? where id = ?',[
            now(),
            $dataRekamMedis->id
        ]);

        return redirect('/rekam-medis')->with('success', 'Yee, Data rekam medis berhasil dihapus sementara!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataRekamMedis $dataRekamMedis
     * @return \Illuminate\Http\Response
     */
    public function hardDelete($id)
    {
        // hardDelete without eloquent
        DB::delete('delete from data_rekam_medis where id = ?',[
            $id
        ]);
        // hardDelete with eloquent
        // DataRekamMedis::destroy($dataRekamMedis->id);

        return redirect('/rekam-medis/trashed')->with('success', 'Yee, Data rekam medis berhasil dihapus permanen!');
    }

    public function print(DataRekamMedis $dataRekamMedis)
    {
        // $dataRekamMedis = DataRekamMedis::all();
        DB::select('select * from data_rekam_medis');
        return view('informasi-medis.rekam-medis.print',['dataRekamMedis'=>$dataRekamMedis]);
    }

    public function trashed()
    {
        // $datas = DB::select('select * from data_rekam_medis data_rekam_medis inner join pasiens pasiens ON pasiens.pasien_id = data_rekam_medis.pasien_id inner join dokters dokters ON  dokters.dokter_id = data_rekam_medis.dokter_id')->whereNotNull('data_rekam_medis.deleted_at');
        // $datas = DB::select('select * from data_rekam_medis ');
        // $datas = DB::select('select * from data_rekam_medis where deleted_at is NOT NULL');
        // rm.id AS id, rm.keluhan AS keluhan, rm.diagnosis AS diagnosis, rm.created_at AS created_at, d.dokter_nama AS dokter_nama, p.pasien_nama AS pasien_nama
        $datas = DB::select('
        select 
            rm.id AS id, rm.keluhan AS keluhan, rm.diagnosis AS diagnosis, rm.created_at AS created_at, d.dokter_nama AS dokter_nama, p.pasien_nama AS pasien_nama
        from 
             data_rekam_medis rm 
        inner join 
             dokters d 
         on
             rm.dokter_id = d.dokter_id 
         inner join 
             pasiens p 
         on 
             rm.pasien_id = p.pasien_id 
         where
            rm.deleted_at is NOT NULL
         ');
        // $datas = DB::table('data_rekam_medis')->whereNotNull('data_rekam_medis.deleted_at')->get();
        // dd($datas);
        return view('informasi-medis.rekam-medis.index', [
            'rekamMedis' => $datas
        ]);
    }

    public function restore($id)
    {
        // request validation
        // $request->validate([
        //     'pasien_id' => 'required|max:255',
        //     'keluhan' => 'required|max:255',
        //     'dokter_id' => 'required|max:255',
        //     'diagnosis' => 'required|max:255',
        // ]);
        
        // without eloquent
        DB::update('UPDATE data_rekam_medis SET deleted_at = ? where id = ?',[
            NULL,
            $id
        ]);

        // with eloquent
        // DataRekamMedis::where('id', $dataRekamMedis->id)->update($validatedData);

        return redirect('/rekam-medis/trashed')->with('success', 'Yee, Data rekam medis berhasil dipulihkan!');
    }

}