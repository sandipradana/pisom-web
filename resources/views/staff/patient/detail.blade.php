@extends('staff.patient.layout')

@section('title', 'Pasien')
@section('sub-title', 'Detil')

@section('sub-content')
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <td>Jurnal</td>
            <td>Tanggal</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($journals as $journal)
        <tr>
            <td><b>Jurnal-{{ $journal->id }}</b></td>
            <td>{{ date('d M Y', strtotime($journal->start)) }} - {{ date('d M Y', strtotime($journal->end)) }}</td>
            <td><a href="{{ route('staff.isolation.detail', $journal->id) }}">View</a></td>
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