<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDokterRequest;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dokter.index', [
            'dokter' => Dokter::All()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create');
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
            'dokter_nama' => 'required|unique:dokters|max:255',
            'spesialis' => 'required|max:255',
            'umur' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'no_telepon' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255',
        ]);

        $pattern = "/([.,])/";
        $namaTanpaGelar = preg_split($pattern, $validatedData['dokter_nama']);
        foreach ($namaTanpaGelar as $n) {
            if (strlen($n) > 2) {
                $namaTanpaGelar = $n;
                break;
            }
        }
        // $validatedData['slug'] = Str::slug($namaTanpaGelar, '-');

        Dokter::create($validatedData);

        return redirect('/data-dokter')->with('success', 'Yee, Data dokter '. $request->dokter_nama .' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        return view('dokter.show', [
            'dokter' => $dokter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', [
            'dokter' => $dokter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $rules = [
            'dokter_nama' => 'required|max:255',
            'spesialis' => 'required|max:255',
            'umur' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'no_telepon' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255',
        ];

        if ($request->nama != $dokter->nama) {
            $rules['dokter_nama'] = 'required|max:255';
        }

        $validatedData = $request->validate($rules);

        // $validatedData['slug'] = Str::slug($validatedData['nama'], '-');

        Dokter::where('dokter_id', $dokter->dokter_id)
            ->update($validatedData);

        return redirect('/data-dokter')->with('success', 'Yee, Data dokter ' . $request->dokter_nama . ' berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        Dokter::destroy($dokter->dokter_id);

        return redirect('/data-dokter')->with('success', 'Yee, Data dokter ' . $dokter->dokter_nama . ' berhasil dihapus!');
    }
    
    public function print(Dokter $dokter)
    {
        $dokter = Dokter::all();
        return view('dokter.print',['dokter' => $dokter]);
    }
}
