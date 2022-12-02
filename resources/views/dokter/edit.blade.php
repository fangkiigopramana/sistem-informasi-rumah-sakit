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
                      <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>

            {{-- Identitas Lengkap Dokter --}}
            <div class="col-lg-8 mb-3">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                    <div class="card-header font-weight-bold">
                        Form Identitas Dokter
                    </div>
                    <form action="/data-dokter/{{ $dokter->dokter_id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="container mt-3 mb-3">
                            <div class="form-group row">
                                <label for="dokter_nama" class="col-sm-2 col-form-label">Nama Dokter</label>
                                <input type="text" class="col-sm-8 form-control @error('dokter_nama') is-invalid @enderror" id="dokter_nama" name="dokter_nama" value="{{ old('dokter_nama', $dokter->dokter_nama) }}" autofocus>
                                <div class="invalid-feedback text-center">
                                    @error('dokter_nama')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="spesialis" class="col-sm-2 col-form-label">Spesialis</label>
                                <input type="text" class="col-sm-8 form-control @error('spesialis') is-invalid @enderror" id="spesialis" name="spesialis" value="{{ old('spesialis', $dokter->spesialis) }}" autofocus>
                                <div class="invalid-feedback text-center">
                                    @error('spesialis')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                                <input type="number" class="col-sm-8 form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur', $dokter->umur) }}">
                                <div class="invalid-feedback text-center">
                                    @error('umur')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki"
                                                {{ ($dokter->jenis_kelamin == 'Laki-laki') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="laki-laki">
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"
                                                {{ ($dokter->jenis_kelamin == 'Perempuan') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="perempuan">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_telepon" class="col-sm-2 col-form-label">No. Telepon</label>
                                <input type="number" class="col-sm-8 form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $dokter->no_telepon) }}">
                                <div class="invalid-feedback text-center">
                                    @error('no_telepon')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <input type="text" class="col-sm-8 form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $dokter->alamat) }}">
                                <div class="invalid-feedback text-center">
                                    @error('alamat')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <input type="email" class="col-sm-8 form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $dokter->email) }}">
                                <div class="invalid-feedback text-center">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-share"></i> Perbarui Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection