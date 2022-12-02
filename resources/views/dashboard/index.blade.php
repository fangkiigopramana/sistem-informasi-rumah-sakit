@extends('layouts.main')
@section('container')

<!-- Main Content -->
    <div id="content">

        

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold col-md-8"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                <nav class="col-md-4" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        
            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tentang Kami</h6>
                        </div>
                        <div class="card-body">
                            <div>
                                <h1 class="font-weight-bold">SISTEM INFORMASI RUMAH SAKIT</h1>
                                <p>Memberikan kemudahan dalam manajemen data pasien, dokter dan rekam medis data pasien.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Bar Chart -->
                <div class="col-xl-6 col-lg-7">
                    <!-- Data Pasien -->
                    <div id="pasien" class="col-xl-12 col-md-6 mb-4 p-0 border-0">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Pasien</div>                                    
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countPasien}}</div>
                                        <small style="color: #c2c6cc">Pasien</small>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Dokter -->
                    <div id="dokter" class="col-xl-12 col-md-6 mb-4 p-0 border-0">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Dokter</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countDokter}}</div>
                                        <small style="color: #c2c6cc">Dokter</small>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Data Rekam Medis -->
                    <div id="dokter" class="col-xl-12 col-md-6 mb-4 p-0 border-0">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Rekam Medis</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countRekamMedis}}</div>
                                        <small style="color: #c2c6cc">Rekam Medis</small>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Pie Chart -->
                <div class="col-xl-6 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 id="titleChart" class="m-0 font-weight-bold text-primary">Presentase Dokter</h6>
                            {{-- <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Laki-laki
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Perempuan
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    {{-- Chart --}}
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script>

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
            data: [
                    {{ json_encode($jenisKelaminPria) }},
                    {{ json_encode($jenisKelaminPerempuan) }},
                ],
            backgroundColor: ['#4e73df','#1cc88a'],
            hoverBackgroundColor: ['#2e59d9', '#1cc88a'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
        },
        });
    </script>
@endsection