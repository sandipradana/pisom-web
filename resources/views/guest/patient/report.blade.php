<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pasien-{{ $patient->id }}-{{ $patient->name }}</title>
</head>

<body>
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td colspan="4">
                    <h2>LAPORAN ISOLASI MANDIRI PASIEN COVID-19</h2>
                </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td>ID Isolasi</td>
                <td>: {{ $journal->id }}</td>
                <td>Nama Staff</td>
                <td>: {{ $patient->staff->name }}</td>
            </tr>
            <tr>
                <td>ID Pasien</td>
                <td>: {{ $patient->id }}</td>
                <td>Rumah Sakit</td>
                <td>: {{ $patient->hospital->name }}</td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>: {{ $patient->name }}</td>
                <td>Status</td>
                <td>: {{ ($journal->status == 1 ? "Selesai" : "Proses") }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ ($patient->gender == 1 ? "Laki - Laki" : "Perempuan") }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>: {{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} Tahun</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Mulai Isolasi</td>
                <td>: {{ $journal->start }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Berakhir Isolasi</td>
                <td>: {{ $journal->end }}</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <span>&nbsp;</span>
    <table border="1" style="width: 100%;">
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
    <span>&nbsp;</span>
    <table border="1" style="width: 100%;">
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
    <span>&nbsp;</span>
    <table border="1" style="width: 100%;">
        <tbody>
            <tr>
                <td>&nbsp;C</td>
                <td colspan="5">Riwayat Test&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;NO</td>
                <td>Tanggal Test</td>
                <td>&nbsp;ID Test</td>
                <td>&nbsp;Jenis Test</td>
                <td>&nbsp;Hasil</td>
                <td>&nbsp;Derajat</td>
            </tr>
            @foreach($tests as $test)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $test->date }}</td>
                <td>{{ $test->id }}</td>
                <td>{{ $test->type->name }}</td>
                <td>{{ ['Negatif', 'Positif', 'Sembuh'][(int) $test->result - 1] }}</td>
                <td>{{ ['-', 'OTG', 'Ringan'][(int) $test->case] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
    <!-- DivTable.com -->
</body>

</html>