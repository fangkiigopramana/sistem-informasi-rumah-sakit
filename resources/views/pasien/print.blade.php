<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cetak Laporan Pasien</title>
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <h3 style="text-align: center">LAPORAN PASIEN</h3>
        <table class="table table-bordered" style="width: 80%" align="center">
            <thead>
              <tr style="text-align: center;background-color:chartreuse;">
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Umur</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telpon</th>
                <th scope="col">Email</th>
                <th scope="col">Terdaftar Pada Tanggal</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pasien as $p)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$p->pasien_nama}}</td>
                    <td>{{$p->umur}}</td>
                    <td>{{$p->jenis_kelamin}}</td>
                    <td>{{$p->alamat}}</td>
                    <td>{{$p->no_telepon}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->created_at}}</td>
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