@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div id="content">

        

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><i class="fas fa-user-injured"></i> Data Pasien</h1>
                <div class="d-flex mb-2 justify-content-end">
                    <a href="/data-pasien/create" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </a>
                    <a href="/data-pasien/cetak" target="_blank" class="btn btn-danger btn-icon-split ml-2">
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
                  <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
                </ol>
            </nav>

            @if (session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    <i class="fa-solid fa-circle-check"></i>  {{ session('success') }}
                </div>
            @endif

             <!-- DataTables Example -->
             <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-warning">
                                <tr>
                                    <th width="20px">No.</th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th width="150px">Jenis Kelamin</th>
                                    <th width="200px">No. Telp</th>
                                    <th width="250px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($pasien as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->pasien_nama }}</td>
                                    <td>{{ $p->umur }}</td>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>{{ $p->no_telepon }}</td>
                                    <td>
                                        <a href="/data-pasien/{{ $p->pasien_id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="/data-pasien/{{ $p->pasien_id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="/data-pasien/{{ $p->pasien_id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0" onclick="return confirm('Upps, Yakin mau hapus data dari {{$p->pasien_nama}} ?')"><i class="fas fa-trash-alt"></i></button>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
@endsection