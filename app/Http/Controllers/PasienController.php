<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use \Cviebrock\EloquentSluggable\Services\SlugService;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pasien.index', [
            'pasien' => DB::select('select * from pasiens')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasien_nama' => 'required|max:255',
            'umur' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'no_telepon' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255',
        ]);
        
        DB::insert('INSERT INTO pasiens(pasien_nama, umur, jenis_kelamin, no_telepon, alamat, email) VALUES(?, ?, ?, ?, ?, ?)',
            [
                $request->pasien_nama,
                $request->umur,
                $request->jenis_kelamin,
                $request->no_telepon,
                $request->alamat,
                $request->email,
            ]
        );

        return redirect('/data-pasien')->with('success', 'Yee, Data pasien berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        $data = DB::select('select pasien_id, pasien_nama, umur, jenis_kelamin, no_telepon, alamat, email from pasiens where pasien_id = :id', ['id' => $pasien->pasien_id])[0];
        // dd($data);
        return view('pasien.show', [
            'pasien' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', [
            'pasien' => $pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'pasien_nama' => 'required|max:255',
            'umur' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'no_telepon' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255',
        ]);

        // if ($request->pasien_nama != $pasien->pasien_nama) {
        //     $rules['pasien_nama'] = 'required|max:255';
        // }

        
        // $validatedData['slug'] = Str::slug($validatedData['nama'], '-');

        DB::update('update pasiens set pasien_nama = :pasien_nama, umur = :umur, jenis_kelamin = :jk, no_telepon = :nt, alamat = :alamat, email = :email where pasien_id = :pasien_id', [
            'pasien_id' => $pasien->pasien_id,
            'pasien_nama' => $request->pasien_nama,
            'umur' => $request->umur,
            'jk' => $request->jenis_kelamin,
            'nt' => $request->no_telepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);
        // Pasien::where('pasien_id', $pasien->pasien_id)
        //     ->update($validatedData);

        return redirect('/data-pasien')->with('success', 'Yee, Data pasien berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        DB::delete('delete from pasiens where pasien_id = :pasien_id',[
            'pasien_id' => $pasien->pasien_id
        ]);

        // pakai eloquent
        // Pasien::destroy($pasien->pasien_id);

        return redirect('/data-pasien')->with('success', 'Yee, Data pasien berhasil dihapus!');
    }

    public function print(Pasien $pasien)
    {
        $pasien = DB::select('select * from pasiens');
        return view('pasien.print', [
            'pasien' => $pasien
        ]);
    }
}
