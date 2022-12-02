@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div id="content">

        

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><i class="fas fa-user-md"></i> Data Dokter</h1>
                <div class="d-flex mb-2 justify-content-end">
                    <a href="/data-dokter/create" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </a>
                    <a href="/data-dokter/cetak" target="_blank" class="btn btn-danger btn-icon-split ml-2">
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
                  <li class="breadcrumb-item active" aria-current="page">Data Dokter</li>
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
                                    <th>Nama Dokter</th>
                                    <th>Umum / Spesialis</th>
                                    <th width="150px">Email</th>
                                    <th width="200px">No. Telp</th>
                                    <th width="250px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokter as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->dokter_nama }}</td>
                                    <td>{{ $d->spesialis }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->no_telepon }}</td>
                                    <td>
                                        <a href="/data-dokter/{{ $d->dokter_id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="/data-dokter/{{ $d->dokter_id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="/data-dokter/{{ $d->dokter_id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data dari {{ $d->dokter_nama }}?')"><i class="fas fa-trash-alt"></i></button>
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