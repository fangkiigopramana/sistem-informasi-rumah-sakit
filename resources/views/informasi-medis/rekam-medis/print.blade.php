<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cetak Laporan Rekam Medis</title>
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <h3 style="text-align: center">LAPORAN REKAM MEDIS</h3>
        <table class="table table-bordered" style="width: 80%" align="center">
            <thead>
              <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Keluhan</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Diagnosa</th>
                <th scope="col">Tanggal Periksa</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($dataRekamMedis as $drm)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$drm->pasien->pasien_nama}}</td>
                    <td>{{$drm->keluhan}}</td>
                    <td>{{$drm->dokter->dokter_nama}}</td>
                    <td>{{$drm->diagnosis}}</td>
                    <td>{{$drm->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>