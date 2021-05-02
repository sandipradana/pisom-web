<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>PISOM - Data Isolasi Pasien</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <img src="/assets/img/logo.png" style="width: 100%" />
            </div>
            <div class="col-11">
                <h3>Aplikasi Isolasi Mandiri</h3>
                <h6>Laporan Pemantauan Isolasi Mandiri</h6>
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
                <h6>Info Pasien</h6>
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>Id</td>
                        <td>{{ $patient->id }}</td>
                        <td>Tanggal Lahir</td>
                        <td>{{ $patient->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $patient->name }}</td>
                        <td>Umur</td>
                        <td>{{ $patient->age }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $patient->email }}</td>
                        <td>Jenis Kelamin</td>
                        <td>{{ $patient->gender_name }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $patient->address }}</td>
                        <td>Phone</td>
                        <td>{{ $patient->phone }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td>A</td>
                            <td colspan="11">Jurnal Pasien</td>
                        </tr>
                        <tr>
                            <td rowspan="2">No</td>
                            <td rowspan="2">Kegiatan</td>
                            <td colspan="10">Masa Isolasi</td>
                        </tr>
                        <tr>
                            <td>&nbsp;HARI 1</td>
                            <td>&nbsp;HARI&nbsp;2</td>
                            <td>&nbsp;HARI&nbsp;3</td>
                            <td>&nbsp;HARI&nbsp;4</td>
                            <td>&nbsp;HARI&nbsp;5</td>
                            <td>&nbsp;HARI&nbsp;6</td>
                            <td>&nbsp;HARI&nbsp;7</td>
                            <td>&nbsp;HARI&nbsp;8</td>
                            <td>HARI&nbsp;9&nbsp;</td>
                            <td>&nbsp;HARI 10</td>
                        </tr>
                        @foreach($todos as $todo)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $todo->name }}</td>
                            @foreach($todoStatus[$todo->id] as $status)
                            <td>{{ ($status->status == 1 ? "Ya" : "Tidak") }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td>B</td>
                            <td colspan="11">Jurnal Pasien</td>
                        </tr>
                        <tr>
                            <td rowspan="2">No</td>
                            <td rowspan="2">Kegiatan</td>
                            <td colspan="10">Masa Isolasi</td>
                        </tr>
                        <tr>
                            <td>&nbsp;HARI 1</td>
                            <td>&nbsp;HARI&nbsp;2</td>
                            <td>&nbsp;HARI&nbsp;3</td>
                            <td>&nbsp;HARI&nbsp;4</td>
                            <td>&nbsp;HARI&nbsp;5</td>
                            <td>&nbsp;HARI&nbsp;6</td>
                            <td>&nbsp;HARI&nbsp;7</td>
                            <td>&nbsp;HARI&nbsp;8</td>
                            <td>HARI&nbsp;9&nbsp;</td>
                            <td>&nbsp;HARI 10</td>
                        </tr>
                        @foreach($symptoms as $todo)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $todo->name }}</td>
                            @foreach($symptomStatus[$todo->id] as $status)
                            <td>{{ ($status->status == 1 ? "Ya" : "Tidak") }}</td>
                            @endforeach
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

<script>
    // window.print()
</script>

</html>