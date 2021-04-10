@extends('staff.patient.layout')

@section('title', 'Pasien')
@section('sub-title', 'Detil')

@section('sub-content')
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <td>Test ID</td>
            <td>Jenis Test</td>
            <td>Derajat</td>
            <td>Tanggal</td>
            <td>Hasil</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tests as $test)
        <tr>
            <td><b>{{ $test->id }}</b></td>
            <td>{{ $test->type->name }}</b></td>
            <td>{{ ['-', 'OTG', 'Ringan'][(int) $test->case] }}</td>
            <td>{{ $test->date }}</td>
            <td>{{ ['Negatif', 'Positif', 'Sembuh'][(int) $test->result - 1] }}</td>
            <td><a href="{{ route('staff.test.detail', $test->id) }}">Lihat</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('breadcrumb')
<div style="float: right;">
    <a href="{{ route('staff.test.create', $patient->id) }}" class="btn btn-danger">Test</a>
    <button onclick="printDocument('{{ route('staff.patient.detail.print', $patient->id) }}')" class="btn btn-danger">Cetak</button>
    <a href="{{ route('staff.patient.edit', $patient->id) }}" class="btn btn-danger">Edit</a>
</div>
@endsection

@push('scripts')
<script>
    function printDocument(url) {
        var doc = window.open(url);
        doc.window.print();
        doc.onafterprint = function() {
            doc.close()
        }
    }
</script>
@endpush