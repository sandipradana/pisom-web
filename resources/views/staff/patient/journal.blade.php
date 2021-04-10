@extends('staff.patient.layout')

@section('title', 'Pasien')
@section('sub-title', 'Detil')

@section('sub-content')
dw
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