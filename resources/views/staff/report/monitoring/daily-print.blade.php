<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>PISOM - Rekap Pemantaun Harian - {{ date("Y-m-d") }}</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <img src="/assets/img/logo.png" style="width: 100%" />
            </div>
            <div class="col-11">
                <h3>Aplikasi Isolasi Mandiri</h3>
                <h5>Rekap Pemantauan Harian</h3>
            </div>
        </div>
        <div class="mn-5">&nbsp;</div>
        <div class="row">
            <div class="col-12">
                <h6>Fasilitas Kesehatan</h6>
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $hospital->name }}</td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>{{ $hospital->phone }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $hospital->address }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h6>Petugas Kesehatan</h6>
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $staff->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $staff->phone }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h6>Rekap</h6>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Cek Gejala</th>
                            <th>Cek Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['date'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['age'] }}</td>
                            <td>{{ $item['gender'] }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td>{{ $item['symptom_status'] }}</td>
                            <td>{{ $item['todo_status'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mn-5">&nbsp;</div>
        <span>&nbsp;</span>
        <table>
            <tbody>
                <tr>
                    <td>&nbsp;Mengetahui</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>{{ $staff->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>