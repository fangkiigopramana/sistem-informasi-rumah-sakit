@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold col-md-8"><i class="fas fa-user-md"></i> Data Dokter</h1>
                <nav class="col-md-4" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="/data-dokter">Data Dokter</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>

            {{-- Identitas Lengkap Dokter --}}
            <div class="col-sm-8 mb-3">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                    <div class="card-header font-weight-bold">
                        Identitas Dokter
                    </div>
                    <div class="container mt-3 mb-3">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="nama" name="nama" value="{{ $dokter->nama }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="spesialis" class="col-sm-2 col-form-label">Spesialis</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="spesialis" name="spesialis" value="{{ $dokter->spesialis }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="umur" name="umur" value="{{ $dokter->umur }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="jenisKelamin" name="jenisKelamin" value="{{ $dokter->jenisKelamin }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="noTelepon" class="col-sm-2 col-form-label">No. Telepon</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="noTelepon" name="noTelepon" value="{{ $dokter->noTelepon }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="alamat" name="alamat" value="{{ $dokter->alamat }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $dokter->email }}" readonly>
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