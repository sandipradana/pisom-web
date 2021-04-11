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
            </div>
        </div>
        <div class="mn-5">&nbsp;</div>
        <div class="row">
            <table class="table" style="width: 100%;">
                <tbody>
                    <tr>
                        <td>ID Test</td>
                        <td>ID Pasien</td>
                        <td>Nama</td>
                        <td>Jenis</td>
                        <td>Tanggal</td>
                        <td>Hasil</td>
                        <td>Derajat</td>
                    </tr>
                    @foreach($tests as $test)
                    <tr>
                        <td>{{ $test->id }}</td>
                        <td>{{ $test->patient->id }}</td>
                        <td>{{ $test->patient->name }}</td>
                        <td>{{ $test->type->name }}</td>
                        <td>{{ $test->created_at }}</td>
                        <td>{{ $test->result_name }}</td>
                        <td>{{ $test->case_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
    window.print()
</script>

</html>