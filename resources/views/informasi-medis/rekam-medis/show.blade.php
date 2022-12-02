@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold col-md-8"><i class="fas fa-poll-h"></i></i> Data Rekam Medis</h1>
                <nav class="col-md-4" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="/rekam-medis">Data Rekam Medis</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>

            {{-- Data Rekam Medis Pasien --}}
            <div class="col-sm-8 mb-3">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                    <div class="card-header font-weight-bold">
                        Data Rekam Medis
                    </div>
                    <div class="container mt-3 mb-3">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $dataRekamMedis->pasien->pasien_nama }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="keluhan" name="keluhan" value="{{ $dataRekamMedis->keluhan }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaDokter" class="col-sm-3 col-form-label">Nama Pemeriksa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="namaDokter" name="namaDokter" value="{{ $dataRekamMedis->dokter->dokter_nama }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="diagnosis" class="col-sm-3 col-form-label">Diagnosis</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="diagnosis" name="diagnosis" value="{{ $dataRekamMedis->diagnosis }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection