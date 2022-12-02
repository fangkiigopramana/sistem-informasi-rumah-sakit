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
        return view('informasi-medis.rekam-medis.index', [
            'rekamMedis' => DataRekamMedis::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informasi-medis.rekam-medis.create', [
            'pasien' => Pasien::All(),
            'dokter' => Dokter::All()
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
        DataRekamMedis::create($validatedData);

        return redirect('/rekam-medis')->with('success', 'Yee, Data rekam medis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataRekamMedis  $dataRekamMedis
     * @return \Illuminate\Http\Response
     */
    public function show(DataRekamMedis $dataRekamMedis)
    {
        return view('informasi-medis.rekam-medis.show', [
            'dataRekamMedis' => $dataRekamMedis,
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
            'pasien' => Pasien::All(),
            'dokter' => Dokter::All()
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
        $rules = [
            'pasien_id' => 'required|max:255',
            'keluhan' => 'required|max:255',
            'dokter_id' => 'required|max:255',
            'diagnosis' => 'required|max:255',
        ];

        // if ($request->nama != $dataRekamMedis->nama) {
        //     $rules['nama'] = 'required|unique:data_rekam_medis|max:255';
        // }

        $validatedData = $request->validate($rules);

        // $validatedData['slug'] = Str::slug($validatedData['nama'], '-');

        DataRekamMedis::where('id', $dataRekamMedis->id)
            ->update($validatedData);

        return redirect('/rekam-medis')->with('success', 'Medical Record has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataRekamMedis $dataRekamMedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataRekamMedis $dataRekamMedis)
    {
        DataRekamMedis::destroy($dataRekamMedis->id);

        return redirect('/rekam-medis')->with('success', 'Medical Record has been deleted!');
    }

    public function print(DataRekamMedis $dataRekamMedis)
    {
        $dataRekamMedis = DataRekamMedis::all();
        return view('informasi-medis.rekam-medis.print',['dataRekamMedis'=>$dataRekamMedis]);
    }

    public function trashed()
    {
        return view('informasi-medis.rekam-medis.index', [
            'rekamMedis' => DataRekamMedis::onlyTrashed()->get()
        ]);
    }

}
