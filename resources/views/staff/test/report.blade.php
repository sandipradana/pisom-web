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
                    <h2>LAPORAN TEST PASIEN COVID-19</h2>
                </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td>ID Pasien</td>
                <td>: {{ $patient->id }}</td>
                <td>Rumah Sakit</td>
                <td>: {{ $patient->hospital->name }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ ($patient->gender == 1 ? "Laki - Laki" : "Perempuan") }}</td>
                <td>Staff</td>
                <td>: {{ $patient->staff->name }}</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>: {{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} Tahun</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <span>&nbsp;</span>
    <table border="1" style="width: 100%;">
        <tbody>
            <tr>
                <td colspan="6">Hasil Test&nbsp;</td>
            </tr>
            <tr>
                <td>Tanggal Test</td>
                <td>&nbsp;ID Test</td>
                <td>&nbsp;Jenis Test</td>
                <td>&nbsp;Hasil</td>
                <td>&nbsp;Derajat</td>
            </tr>
            <tr>
                <td>{{ $test->date }}</td>
                <td>{{ $test->id }}</td>
                <td>{{ $test->type->name }}</td>
                <td>{{ ['Negatif', 'Positif', 'Sembuh'][(int) $test->result - 1] }}</td>
                <td>{{ ['-', 'OTG', 'Ringan'][(int) $test->case] }}</td>
            </tr>
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