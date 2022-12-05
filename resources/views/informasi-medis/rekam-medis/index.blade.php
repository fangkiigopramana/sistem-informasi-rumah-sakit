@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div id="content">

        

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><i class="fas fa-poll-h"></i> Data Rekam Medis @if (Request::is('rekam-medis/trashed')) Terhapus @endif </h1>
                <div class="d-flex mb-2 justify-content-end">
                    @if (Request::is('rekam-medis')) 
                        <a href="/rekam-medis/create" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </a>
                    @endif
                    
                    @if (Request::is('rekam-medis/trashed'))
                        
                    <a href="/rekam-medis" class="btn btn-info btn-icon-split ml-2">
                        <span class="icon text-white-50">
                            {{-- <i class="fas fa-trash"></i> --}}
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Data Tersimpan</span>
                    </a>
                    @else
                        
                    <a href="/rekam-medis/trashed" class="btn btn-warning btn-icon-split ml-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-list-alt"></i>
                            {{-- <i class="fa-solid fa-trash-list"></i> --}}
                        </span>
                        <span class="text">Data Terhapus</span>
                    </a>
                    @endif
                    <a href="/rekam-medis/cetak" target="_blank" class="btn btn-danger btn-icon-split ml-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text">Cetak Laporan</span>
                    </a>
                </div>
            </div>
            <nav class="col-md-4" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Rekam Medis</li>
                </ol>
            </nav>

            @if (session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                </div>
            @endif

             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-warning">
                                <tr>
                                    <th width="20px">No.</th>
                                    <th width="150px">Tanggal Periksa</th>
                                    <th width="200px">Nama Pasien</th>
                                    <th width="200px">Keluhan</th>
                                    <th width="200px">Nama Dokter</th>
                                    <th width="150px">Diagnosa</th>
                                    <th width="300px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekamMedis as $rm)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rm->created_at }}</td>
                                        {{-- <td>{{ DB::select('select pasien_nama from pasiens where pasien_id = :pasien_id',['pasien_id' => '1']) }}</td> --}}
                                        {{-- <td>{{ $rm->pasien->pasien_nama }}</td> --}}
                                        <td>{{ $rm->pasien_nama }}</td>
                                        <td>{{ $rm->keluhan }}</td>
                                        <td>{{ $rm->dokter_nama }}</td>
                                        {{-- <td>{{ $rm->dokter->dokter_nama }}</td> --}}
                                        <td>{{ $rm->diagnosis }}</td>
                                        <td class="col-md-3">
                                            
                                            <a href="/rekam-medis/{{ $rm->id }}" class="btn btn-info" title="Lihat Data"><i class="fas fa-eye"></i></a>
                                            @if (Request::is('rekam-medis/trashed'))

                                                {{-- restore --}}
                                                {{-- <a href="/rekam-medis/restore/{{ $rm->id }}" class="btn btn-success"><i class="fas fa-undo"></i></a> --}}
                                                <form action="/rekam-medis/restore/{{ $rm->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-success border-0" onclick="return confirm('Upps, Yakin mau pulihkan data rekam medis dari {{$rm->pasien_nama}} ?')" title="Pulihkan data">
                                                        {{-- <i class="fas fa-undo"></i> --}}
                                                        <i class="fas fa-recycle"></i>
                                                    </button>
                                                    {{-- <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data rekam medis dari {{$rm->pasien->pasien_nama}} ?')"><i class="fas fa-trash-alt"></i></button> --}}
                                                </form> 
                                            @else
                                                {{-- edit --}}
                                                <a href="/rekam-medis/edit/{{ $rm->id }}" class="btn btn-warning"><i class="fas fa-edit" title="Ubah data"></i></a>

                                                {{-- delete sementara --}}
                                                <form action="/rekam-medis/hapus-sementara/{{ $rm->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus sementara data rekam medis dari {{$rm->pasien_nama}} ?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                        {{-- <i class="fa-solid fa-trash-clock"></i> --}}
                                                    </button>
                                                    {{-- <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data rekam medis dari {{$rm->pasien->pasien_nama}} ?')"><i class="fas fa-trash-alt"></i></button> --}}
                                                </form>                                                
                                            @endif

                                            {{-- delete permanen --}}
                                            <form action="/rekam-medis/hapus-permanen/{{ $rm->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger border-0 bg-{{ Request::is('rekam-medis/trashed') ? "danger" : "dark" }}" onclick="return confirm('Upps, Yakin mau hapus permanen data rekam medis dari {{$rm->pasien_nama}} ?')" title="Hapus permanen">
                                                    {{-- <i class="fa-solid fa-trash text-light"></i> --}}
                                                    <i class="fas fa-fire text-light"></i>
                                                </button>
                                                {{-- <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data rekam medis dari {{$rm->pasien->pasien_nama}} ?')"><i class="fas fa-trash-alt"></i></button> --}}
                                            </form>                                                
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection