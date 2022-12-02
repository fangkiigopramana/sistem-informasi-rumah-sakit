<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cetak Laporan Dokter</title>
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <h3 style="text-align: center">LAPORAN DATA DOKTER</h3>
        <table class="table table-bordered" style="width: 80%" align="center">
            <thead>
              <tr style="text-align: center">
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Spesialis</th>
                <th scope="col">Umur</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telpon</th>
                <th scope="col">Email</th>
                <th scope="col">Terdaftar Pada Tanggal</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($dokter as $d)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->spesialis}}</td>
                    <td>{{$d->umur}}</td>
                    <td>{{$d->jenisKelamin}}</td>
                    <td>{{$d->alamat}}</td>
                    <td>{{$d->noTelepon}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->created_at}}</td>
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