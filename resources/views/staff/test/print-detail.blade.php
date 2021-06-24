<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>PISOM - Data Test Pasien</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-1">
                <img src="/assets/img/logo.png" style="width: 100%" />
            </div>
            <div class="col-11">
                <h3>Aplikasi Isolasi Mandiri</h3>
                <h6>Detil Test Pasien</h6>
            </div>
        </div>
        <div class="mn-5">&nbsp;</div>
        <div class="row">
            <div class="col-12">
                <h6>Fasilitas Kesehatan</h6>
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $data->hospital_name }}</td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>{{ $data->hospital_phone }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $data->hospital_address }}</td>
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
                        <td>{{ $data->patient_id }}</td>
                        <td>Tanggal Lahir</td>
                        <td>{{ $data->patient_date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $data->patient_name }}</td>
                        <td>Umur</td>
                        <td>{{ $data->patient_age }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $data->patient_email }}</td>
                        <td>Jenis Kelamin</td>
                        <td>{{ $data->patient_gender }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $data->patient_address }}</td>
                        <td>Phone</td>
                        <td>{{ $data->patient_phone }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h6>Hasil Test</h6>
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>ID Test</td>
                        <td>Jenis</td>
                        <td>Tanggal</td>
                        <td>Hasil</td>
                        <td>Derajat</td>
                    </tr>
                    @foreach(json_decode($data->tests) as $test)
                    <tr>
                        <td>{{ $test->id }}</td>
                        <td>{{ $test->name }}</td>
                        <td>{{ date("Y-m-d", strtotime($test->date)) }}</td>
                        <td>{{ $test->result }}</td>
                        <td>{{ $test->case }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <span>&nbsp;</span>
        <table>
            <tbody>
            <tr>
                    <td>&nbsp;{{ date("Y-m-d") }}<br />&nbsp;Mengetahui</td>
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
                    <td>{{ @$staff->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

<script>
    window.print()
</script>

</html>