@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold col-md-8"><i class="fas fa-poll-h"></i> Data Rekam Medis</h1>
                <nav class="col-md-4" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="/rekam-medis">Data Rekam Medis</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>

            {{-- Data Rekam Medis --}}
            <div class="col-lg-8 mb-3">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                    <div class="card-header font-weight-bold">
                        Form Data Rekam Medis
                    </div>
                    <form action="/rekam-medis/{{ $dataRekamMedis->id }}" method="post">
                        @method('post')
                        @csrf
                        <div class="container mt-3 mb-3">
                            <div class="form-group row">
                                <label for="pasien_id" class="col-sm-3 col-form-label">Nama Pasien</label>
                                <select class="custom-select col-sm-8 form-control @error('nama') is-invalid @enderror" id="pasien_id" name="pasien_id">
                                    <option selected value="{{$dataRekamMedis->pasien->pasien_id}}">{{ $dataRekamMedis->pasien->pasien_nama }}</option>
                                    <?php foreach($pasien as $p) : ?>
                                    <?php if($p->pasien_id == $dataRekamMedis->pasien_id) continue ?>
                                        <option value="{{ $p->pasien_id }}">{{ $p->pasien_nama }}</option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback text-center">
                                    @error('nama')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                                <input type="text" class="col-sm-8 form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" value="{{ old('nama', $dataRekamMedis->keluhan) }}" autofocus>
                                <div class="invalid-feedback text-center">
                                    @error('keluhan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dokter_id" class="col-sm-3 col-form-label">Nama Pemeriksa</label>
                                <select class="custom-select col-sm-8 form-control @error('dokter_nama') is-invalid @enderror" id="dokter_id" name="dokter_id">
                                    <option selected value="{{$dataRekamMedis->dokter->dokter_id}}">{{ $dataRekamMedis->dokter->dokter_nama }}</option>
                                    <?php foreach($dokter as $d) : ?>
                                    <?php if($d->dokter_id == $dataRekamMedis->dokter_id) continue ?>
                                        <option value="{{ $d->dokter_id }}">{{ $d->dokter_nama }}</option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback text-center">
                                    @error('dokter_nama')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="diagnosis" class="col-sm-3 col-form-label">Diagnosis</label>
                                <input type="text" class="col-sm-8 form-control @error('diagnosis') is-invalid @enderror" id="diagnosis" name="diagnosis" value="{{ old('nama', $dataRekamMedis->diagnosis) }}" autofocus>
                                <div class="invalid-feedback text-center">
                                    @error('diagnosis')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-share"></i> Kirim Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection